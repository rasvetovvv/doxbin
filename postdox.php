<?php
//ini_set('display_errors', 'on');
header('Content-Disposition: inline; filename="postdox.php.bak"');
session_start();

$name = md5(mt_rand());
$_SESSION["name"] = $name;

$dox = md5(mt_rand());
$_SESSION["dox"] = $dox;

$hidden = md5(mt_rand());
$_SESSION["hidden"] = $hidden;

include('inc/inc.php');
?>
<!DOCTYPE HTML>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>KRYVBIN - Post Dox</title>
</head>
<body>
<div class="container">
    <div class="well">
        <h1>Post Dox</h1>
        <hr />
            <div class="row">
                <form action="post.php" method="post" class="form-horizontal">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label class="col-xs-1 control-label">Name</label>
                        <div class="col-xs-11">
                            <input type="text" placeholder="Dox Name" class="form-control" id="name" name="<?php echo $_SESSION["name"]; ?>" /><br />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-1 control-label">Dox</label>
                        <div class="col-xs-11">
                            <textarea class="form-control" placeholder="Post your dox in here" id="dox" name="<?php echo $_SESSION["dox"]; ?>" rows="15">DOX go here. This is not your personal slam page, nor is it a page on which to brag about having 0wned someone, or to complain that they 0wned you. Post whatever info you have and SHUT UP. There are no limits on what kind of info you can post, so feel free to drop SSNs, financial, medical info, or anything else that is blatantly illegal. We have a strict non-removal policy, so once the dox go up, they stay up unless they are inaccurate, or you didn't include at least a name and address. Asking for dox to be removed is probably the surest way for them to be updated and expanded upon. You have been warned.</textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-3">
                        <input type="submit" class="btn btn-primary" value="Post" />
                        <input type="hidden" name="<?php echo $hidden; ?>" value=""/>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="well" align="center">
        <p class="contact">
        KryvBin - Doxing<br />
Інста адміна (<a href="/inst.html">Інста</a>)<br />
E-mail: <a href="mailto:dozverkhovyna@gmail.com">dozverkhovyna@gmail.com</a> (Use it)<br />
Complaints: gg123<br />
        </p>
    </div>
</div>

