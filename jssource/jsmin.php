<?php

class JSMin {
    /**
     * Calls the SugarMin minify function.
     *
     * @param string $js Javascript to be minified
     * @return string Minified javascript
     */
    public static function minify($js, $filename = '') {
        return SugarMin::minify($js);
    }
}

/**
 * SugarMin is a Javascript minifier with two levels of compression. The default compression
 * is set to light. Light compression will preserve some line breaks that may interfere with
 * operation of the script. Deep compression will remove all the line breaks, but before using
 * deep compression make sure the script has passed JSLint.
 */
class SugarMin {
    protected $noSpaceChars = array('\\', '$', '_', '/');
    protected $postNewLineSafeChars = array('\\', '$', '_', '{', '[', '(', '+', '-');
    protected $preNewLineSafeChars = array('\\', '$', '_', '}', ']', ')', '+', '-', '"', "'");
    protected $regexChars = array('(', ',',  '=', ':', '[', '!', '&', '|', '?', '{', '}', ';');
    protected $compression;

    private function __construct() {}

    /**
     * Entry point function to minify javascript.
     *
     * @param string $js Javascript source code as a string.
     * @param string $compression Compression option. {light, deep}.
     * @return string $output Output javascript code as a string.
     */
    static public function minify($js, $compression = 'light') {
        try {
            $me = new SugarMin();
            $output = $me->jsParser($js, $compression);
            return $output;
        } catch (Exception $e) {
            // Exception handling is left up to the implementer.
            throw $e;
        }
    }

    /**
	 * jsParser will take javascript source code and minify it.
     *
     * Note: There is a lot of redundant code since both passes
     * operate similarly but with slight differences. It will probably
     * be a good idea to refactor the code at a later point when it is stable.
	 *
     * JSParser will perform 3 passes on the code. Pass 1 takes care of single
     * line and mult-line comments. Pass 2 performs some sanitation on each of the lines
     * and pass 3 works on stripping out unnecessary spaces.
     *
	 * @param string $js
	 * @param string $currentOptions
	 * @return void
	 */
    protected function jsParser($js, $compression = 'light') {

        // We first perform a few operations to simplify our
        // minification process. We convert all carriage returns
        // into line breaks.
        $js = str_replace("\r\n", "\n", $js);
        $js = str_replace("\r", "\n", $js);
        $js = preg_replace("/\n+/","\n", $js);

        $stripped_js = '';
        $prevChar = null;
        $lastChar = null;

        // Pass 1, strip out single line and multi-line comments.
        for ($i = 0; $i < strlen($js); $i++) {
            $char = $js[$i];

            if (strlen($stripped_js) > 0) {
                $lastChar = $stripped_js[strlen($stripped_js) - 1];
            }

            if ($lastChar != " " && $lastChar != "\n" && $lastChar != null) {
                $prevChar = $lastChar;
            }

            switch ($char) {
                case "\\": // If escape character
                    $stripped_js .= $char.$js[$i + 1];
                    $i++;
                    break;
                case '"': // If string literal
                case "'":
                    $literal = $delimiter = $char;

                    for ($j = $i + 1; $j < strlen($js); $j++) {
                        $literal .= $js[$j];

                        if ($js[$j] == "\\") {
                            $literal .= $js[$j + 1];
                            $j++;
                            continue;
                        }

                        if ($js[$j] == $delimiter) {
                            break;
                        }
                    }

                    $i = $j;
                    $stripped_js .= $literal;
                    break;
                case "/": // If comment or regex
                    if ($js[$i + 1] == "/") {
                        $comment = $char;
                        for ($j = $i + 1; $j < strlen($js); $j++) {
                            if ($js[$j] == "\\") {
                                $j++;
                                continue;
                            }

                            if ($js[$j + 1] == "\n") {
                                break;
                            }

                            $comment .= $js[$j];
                        }
                        $i = $j;
                        break;
                    } else if ($js[$i + 1] == "*") {
                        $mlcomment = $char;
                        for ($j = $i + 1; $j < strlen($js); $j++) {
                            if ($js[$j] == "\\") {
                                $j++;
                                continue;
                            }

                            if ($js[$j] == "*" && $js[$j + 1] == "/") {
                                break;
                            }

                            $mlcomment .= $js[$j];
                        }

                        $i = $j + 1;
                        break;
                    } else if (in_array($prevChar, $this->regexChars) || $prevChar == null) {
                        $nesting = 0;
                        $stripped_js .= $js[$i];

                        for ($j = $i + 1; $j < strlen($js); $j++) {
                            if ($js[$j] == "\\") {
                                $stripped_js .= $js[$j].$js[$j + 1];
                                $j++;
                                continue;
                            }

                            if ($js[$j] == '[') {
                                $nesting++;
                            } else if ($js[$j] == ']') {
                                $nesting--;
                            }

                            $stripped_js .= $js[$j];

                            if ($js[$j] == '/' && $nesting == 0 && $prevChar != "\\") {
                                break;
                            }
                        }
                        $i = $j;
                        break;
                    }
                default:
                    $stripped_js .= $char;
                    break;
            }
        }

        // Split our string up into an array and iterate over each line
        // to do processing.
        $input = explode("\n", $stripped_js);
        $primedInput = '';

        // Pass 2, remove space and tabs from each line.
        for ($index = 0; $index < count($input); $index++) {
            $line = $input[$index];

            $line = trim($line, " \t");

            // If the line is empty, ignore it.
            if (strlen($line) == 0) {
                continue;
            }

            $primedInput[] = $line;
        }

        $input = $primedInput;
        $output = '';

        // Pass 3, remove extra spaces
        for ($index = 0; $index < count($input); $index++) {
            $line = $input[$index];
            $newLine = '';
            $len = strlen($line);

            $nextLine = ($index < count($input) -1 ) ? $input[$index + 1] : '';

            $lastChar = ($len > 0) ? $line[$len - 1] : $line[0];
            $nextChar = ($nextLine) ? $nextLine[0] : null;

            // Iterate through the string one character at a time.
            for ($i = 0; $i < $len; $i++) {
                switch($line[$i]) {
                    case "\\":
                        $newLine .= $line[$i].$line[$i + 1];
                        $i++;
                        break;
                    case '/':
                        // Check if regular expression
                        if (strlen($newLine) > 0 && in_array($newLine[strlen($newLine) - 1], $this->regexChars)) {
                            $nesting = 0;
                            $newLine .= $line[$i];

                            for ($j = $i + 1; $j < $len; $j++) {
                                if ($line[$j] == "\\") {
                                    $newLine .= $line[$j].$line[$j + 1];
                                    $j++;
                                    continue;
                                }

                                if ($line[$j] == '[') {
                                    $nesting++;
                                } else if ($line[$j] == ']') {
                                    $nesting--;
                                }

                                $newLine .= $line[$j];
                                if ($line[$j] == '/' && $nesting == 0 && $newLine[strlen($newLine) - 1] != "\\") {
                                    break;
                                }
                            }
                            $i = $j;
                        } else {
                            $newLine .= $line[$i];
                        }
                        break;
                    // String literals shall be transcribed as is.
                    case '"':
                    case "'":
                        $literal = $delimiter = $line[$i];

                        for ($j = $i + 1; $j < strlen($line); $j++) {
                            $literal .= $line[$j];

                            if ($line[$j] == "\\") {
                                $literal .= $line[$j + 1];
                                $j++;
                                continue;
                            }

                            if ($line[$j] == $delimiter) {
                                break;
                            }

                            if ($line[$j] == "\n") {

                            }
                        }

                        $i = $j;
                        $newLine .= $literal;
                        break;
                    // Tabs must be replaced with spaces and then re-evaluated to see if the space is necessary.
                    case "\t":
                        $line[$i] = " ";
                        $i--;
                        break;
                    case ' ':
                        if ( !(
                                (ctype_alnum($line[$i - 1]) || in_array($line[$i - 1], $this->noSpaceChars))
                                &&
                                (in_array($line[$i+1], $this->noSpaceChars) || ctype_alnum($line[$i+1]))
                            )) {
                            // Omit space;
                            break;
                        }
                    default:
                        $newLine .= $line[$i];
                        break;
                }
            }

            if ((ctype_alnum($lastChar) || in_array($lastChar, $this->preNewLineSafeChars)) && ((in_array($nextChar, $this->postNewLineSafeChars) || ctype_alnum($nextChar)))) {
                $newLine .= "\n";
            }

            $output .= $newLine;
        }

        if ($compression == 'deep') {
            return trim(str_replace("\n", "", $output));
        } else {
           return "\n".$output."\n";
        }
	}
}