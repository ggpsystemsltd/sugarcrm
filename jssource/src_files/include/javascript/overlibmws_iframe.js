/*
Preamble
The intent of this document is to state the conditions under which a Package may be copied, such that the Copyright Holder maintains some semblance of artistic control over the development of the package, while giving the users of the package the right to use and distribute the Package in a more-or-less customary fashion, plus the right to make reasonable modifications.
Definitions:
"Package" refers to the collection of files distributed by the Copyright Holder, and derivatives of that collection of files created through textual modification.

"Standard Version" refers to such a Package if it has not been modified, or has been modified in accordance with the wishes of the Copyright Holder.

"Copyright Holder" is whoever is named in the copyright or copyrights for the package.

"You" is you, if you're thinking about copying or distributing this Package.

"Reasonable copying fee" is whatever you can justify on the basis of media cost, duplication charges, time of people involved, and so on. (You will not be required to justify it to the Copyright Holder, but only to the computing community at large as a market that must bear the fee.)

"Freely Available" means that no fee is charged for the item itself, though there may be fees involved in handling the item. It also means that recipients of the item may redistribute it under the same conditions they received it.
You may make and give away verbatim copies of the source form of the Standard Version of this Package without restriction, provided that you duplicate all of the original copyright notices and associated disclaimers.
You may apply bug fixes, portability fixes and other modifications derived from the Public Domain or from the Copyright Holder. A Package modified in such a way shall still be considered the Standard Version.
You may otherwise modify your copy of this Package in any way, provided that you insert a prominent notice in each changed file stating how and when you changed that file, and provided that you do at least ONE of the following:
place your modifications in the Public Domain or otherwise make them Freely Available, such as by posting said modifications to Usenet or an equivalent medium, or placing the modifications on a major archive site such as ftp.uu.net, or by allowing the Copyright Holder to include your modifications in the Standard Version of the Package.
use the modified Package only within your corporation or organization.
rename any non-standard executables so the names do not conflict with standard executables, which must also be provided, and provide a separate manual page for each non-standard executable that clearly documents how it differs from the Standard Version.
make other distribution arrangements with the Copyright Holder.
You may distribute the programs of this Package in object code or executable form, provided that you do at least ONE of the following:
distribute a Standard Version of the executables and library files, together with instructions (in the manual page or equivalent) on where to get the Standard Version.
accompany the distribution with the machine-readable source of the Package with your modifications.
accompany any non-standard executables with their corresponding Standard Version executables, giving the non-standard executables non-standard names, and clearly documenting the differences in manual pages (or equivalent), together with instructions on where to get the Standard Version.
make other distribution arrangements with the Copyright Holder.
You may charge a reasonable copying fee for any distribution of this Package. You may charge any fee you choose for support of this Package. You may not charge a fee for this Package itself. However, you may distribute this Package in aggregate with other (possibly commercial) programs as part of a larger (possibly commercial) software distribution provided that you do not advertise this Package as a product of your own.
The scripts and library files supplied as input to or produced as output from the programs of this Package do not automatically fall under the copyright of this Package, but belong to whomever generated them, and may be sold commercially, and may be aggregated with this Package.
C or perl subroutines supplied by you and linked into this Package shall not be considered part of this Package.
The name of the Copyright Holder may not be used to endorse or promote products derived from this software without specific prior written permission.
THIS PACKAGE IS PROVIDED "AS IS" AND WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTIBILITY AND FITNESS FOR A PARTICULAR PURPOSE.
*/
/*
 overlibmws_iframe.js plug-in module - Copyright Foteos Macrides 2003-2005
   Masks system controls to prevent obscuring of popops for IE v5.5 or higher.
   Initial: October 19, 2003 - Last Revised: May 15, 2005
 See the Change History and Command Reference for overlibmws via:

	http://www.macridesweb.com/oltest/

 Published under an open source license: http://www.macridesweb.com/oltest/license.html
*/

OLloaded=0;

var OLifsP1=null,OLifsSh=null,OLifsP2=null;

// IFRAME SHIM SUPPORT FUNCTIONS
function OLinitIfs(){
if(!OLie55)return;
if((OLovertwoPI)&&over2&&over==over2){
var o=o3_frame.document.all['overIframeOvertwo'];
if(!o||OLifsP2!=o){OLifsP2=null;OLgetIfsP2Ref();}return;}
o=o3_frame.document.all['overIframe'];
if(!o||OLifsP1!=o){OLifsP1=null;OLgetIfsRef();}
if((OLshadowPI)&&o3_shadow){o=o3_frame.document.all['overIframeShadow'];
if(!o||OLifsSh!=o){OLifsSh=null;OLgetIfsShRef();}}
}

function OLsetIfsRef(o,i,z){
o.id=i;o.src='javascript:false;';o.scrolling='no';var os=o.style;
os.position='absolute';os.top=0;os.left=0;os.width=1;os.height=1;os.visibility='hidden';
os.zIndex=over.style.zIndex-z;os.filter='Alpha(style=0,opacity=0)';
}

function OLgetIfsRef(){
if(OLifsP1||!OLie55)return;
OLifsP1=o3_frame.document.createElement('iframe');
OLsetIfsRef(OLifsP1,'overIframe',2);
o3_frame.document.body.appendChild(OLifsP1);
}

function OLgetIfsShRef(){
if(OLifsSh||!OLie55)return;
OLifsSh=o3_frame.document.createElement('iframe');
OLsetIfsRef(OLifsSh,'overIframeShadow',3);
o3_frame.document.body.appendChild(OLifsSh);
}

function OLgetIfsP2Ref(){
if(OLifsP2||!OLie55)return;
OLifsP2=o3_frame.document.createElement('iframe');
OLsetIfsRef(OLifsP2,'overIframeOvertwo',1);
o3_frame.document.body.appendChild(OLifsP2);
}

function OLsetDispIfs(o,w,h){
var os=o.style;
os.width=w+'px';os.height=h+'px';os.clip='rect(0px '+w+'px '+h+'px 0px)';
o.filters.alpha.enabled=true;
}

function OLdispIfs(){
if(!OLie55)return;
var wd=over.offsetWidth,ht=over.offsetHeight;
if(OLfilterPI&&o3_filter&&o3_filtershadow){wd+=5;ht+=5;}
if((OLovertwoPI)&&over2&&over==over2){
if(!OLifsP2)return;
OLsetDispIfs(OLifsP2,wd,ht);return;}
if(!OLifsP1)return;
OLsetDispIfs(OLifsP1,wd,ht);
if((!OLshadowPI)||!o3_shadow||!OLifsSh)return;
OLsetDispIfs(OLifsSh,wd,ht);
}

function OLshowIfs(){
if(OLifsP1){OLifsP1.style.visibility="visible";
if((OLshadowPI)&&o3_shadow&&OLifsSh)OLifsSh.style.visibility="visible";}
}

function OLhideIfs(o){
if(!OLie55||o!=over)return;
if(OLifsP1)OLifsP1.style.visibility="hidden";
if((OLshadowPI)&&o3_shadow&&OLifsSh)OLifsSh.style.visibility="hidden";
}

function OLrepositionIfs(X,Y){
if(OLie55){if((OLovertwoPI)&&over2&&over==over2){
if(OLifsP2)OLrepositionTo(OLifsP2,X,Y);}
else{if(OLifsP1){OLrepositionTo(OLifsP1,X,Y);if((OLshadowPI)&&o3_shadow&&OLifsSh)
OLrepositionTo(OLifsSh,X+o3_shadowx,Y+o3_shadowy);}}}
}

OLiframePI=1;
OLloaded=1;
