$player = jQuery.noConflict();
$player(function () {
    //This script detects the following:
//Flash
//Windows Media Player
//Java
//Shockwave
//RealPlayer
//QuickTime
//Acrobat Reader
//SVG Viewer


//    var agt = navigator.userAgent.toLowerCase();
//    var ie = (agt.indexOf("msie") != -1);
//    var ns = (navigator.appName.indexOf("Netscape") != -1);
//    var win = ((agt.indexOf("win") != -1) || (agt.indexOf("32bit") != -1));
//    var mac = (agt.indexOf("mac") != -1);
//
//    if (ie && win) {
//        pluginlist = detectIE("Adobe.SVGCtl", "SVG Viewer") + detectIE("SWCtl.SWCtl.1", "Shockwave Director") + detectIE("ShockwaveFlash.ShockwaveFlash.1", "Shockwave Flash") + detectIE("rmocx.RealPlayer G2 Control.1", "RealPlayer") + detectIE("QuickTimeCheckObject.QuickTimeCheck.1", "QuickTime") + detectIE("MediaPlayer.MediaPlayer.1", "Windows Media Player") + detectIE("PDF.PdfCtrl.5", "Acrobat Reader");
//    }
//    if (ns || !win) {
//        nse = "";
//        for (var i = 0; i < navigator.mimeTypes.length; i++)
//            nse += navigator.mimeTypes[i].type.toLowerCase();
//        pluginlist = detectNS("image/svg-xml", "SVG Viewer") + detectNS("application/x-director", "Shockwave Director") + detectNS("application/x-shockwave-flash", "Shockwave Flash") + detectNS("audio/x-pn-realaudio-plugin", "RealPlayer") + detectNS("video/quicktime", "QuickTime") + detectNS("application/x-mplayer2", "Windows Media Player") + detectNS("application/pdf", "Acrobat Reader");
//    }
//
//    function detectIE(ClassID, name) {
//        result = false;
//        document.write('<SCRIPT LANGUAGE=VBScript>\n on error resume next \n result = IsObject(CreateObject("' + ClassID + '"))</SCRIPT>\n');
//        if (result)
//            return name + ',';
//        else
//            return '';
//    }
//    function detectNS(ClassID, name) {
//        n = "";
//        if (nse.indexOf(ClassID) != -1)
//            if (navigator.mimeTypes[ClassID].enabledPlugin != null)
//                n = name + ",";
//        return n;
//    }
//
//    pluginlist += navigator.javaEnabled() ? "Java," : "";
//    if (pluginlist.length > 0)
//        pluginlist = pluginlist.substring(0, pluginlist.length - 1);
//
//var installFlash = 'yes';
//    if (pluginlist.indexOf("Flash") == -1)
//    {
//   installFlash = 'no';  
//      alert('Video chỉ hỗ trợ trên trình duyệt chrome, xin hãy xem video trên google chrome!');
//    }
//


    $player('#mybody').attr('onkeypress', 'return disableCtrlKeyCombination(event);');
    $player('#mybody').attr('onkeydown', 'return disableCtrlKeyCombination(event);');

    var video_id = $player("#lakitaid").val();
    $player.ajax({
        type: "POST",
        url: base_url + 'player.html',
        data: {
            video_id: video_id
        },
        dataType: "text",
        beforeSend: function (xhr)
        {
            xhr.setRequestHeader("Ajax-Request", "true");
        },
        success: function (response)
        {
            if (response == '')
            {
                //alert('Video không tồn tại')
                return;
            }
            //console.log(response);
            jwplayer('mediaspace').setup({
                file: response,
                autostart: 'true',
                width: "100%",
                aspectratio: "16:9",
                stretching: 'fill',
                abouttext: "Lakita.vn",
                aboutlink: "https://lakita.vn",
                primary: "flash",
                skin: base_url + "jwplayer/skins/lakita.xml",
            });
        }
    });
})





