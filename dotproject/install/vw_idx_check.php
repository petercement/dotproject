<?php // $Id$

global $cfgDir, $cfgFile, $failedImg, $filesDir, $locEnDir, $okImg, $tblwidth, $tmpDir, $baseDir;
$cfgDir = isset($cfgDir) ? $cfgDir : "$baseDir/includes";
$cfgFile = isset($cfgFile) ? $cfgFile : "$baseDir/includes/config.php";
$filesDir = isset($filesDir) ? $filesDir : "$baseDir/files";
$locEnDir = isset($locEnDir) ? $locEnDir : "$baseDir/locales/en";
$tmpDir = isset($tmpDir) ? $tmpDir : "$baseDir/files/temp";
$tblwidth = isset($tblwidth) ? $tblwidth :'100%';
$chmod = '0777';
?>

<table cellspacing="0" cellpadding="3" border="0" class="tbl" width="<?php echo $tblwidth; ?>" align="center">
<tr>
            <td class="title" colspan="2">Check for Requirements</td>
</tr>
<tr>
 <td class="item">PHP Version >= 4.1</td>
 <td align="left"><?php echo phpversion() < '4.1' ? '<b class="error">'.$failedImg.' ('.phpversion().'): dotProject may not work. Please upgrade!</b>' : '<b class="ok">'.$okImg.'</b><span class="item"> ('.phpversion().')</span>';?></td>
</tr>
<tr>
 <td class="item"><li>Server API</li></td>
  <td align="left"><?php echo (php_sapi_name() != "cgi") ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.php_sapi_name().')</span>' : '<b class="error">'.$failedImg.' CGI mode is likely to have problems</b>';?></td>
</tr>

<tr>
 <td class="item"><li>GD Support (for GANTT Charts)</li></td>
  <td align="left"><?php echo extension_loaded('gd') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b> GANTT Chart functionality may not work correctly.';?></td>
</tr>
<tr>
 <td class="item"><li>Zlib compression Support</li></td>
  <td align="left"><?php echo extension_loaded('zlib') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b> Non-core Backup module is working with some minor restrictions.';?></td>
</tr>
<tr>
 <td class="item"><li>File Uploads</li></td>
  <td align="left"><?php echo get_cfg_var('file_uploads') ? '<b class="ok">'.$okImg.'</b><span class="item"> (Max File Upload Size: '. min(ini_get('upload_max_filesize'), ini_get('post_max_size'), ini_get('memory_limit')) .')</span>' : '<b class="error">'.$failedImg.'</b><span class="warning"> Upload functionality will not be available</span>';?></td>
</tr>
<tr>
            <td class="item">Session Save Path writable?</td>
            <td align="left"><?php echo (is_dir( get_cfg_var( 'session.save_path' )) && is_writable( get_cfg_var( 'session.save_path' )) ) ? '<b class="ok">'.$okImg.'</b> <span class="item">('.get_cfg_var( 'session.save_path').')</span>' : '<b class="error">'.$failedImg.' Fatal:</b> <b class="item">'.get_cfg_var( "session.save_path" ).'</b><b class="error"> not existing or not writable</b>';?></td>
</tr>
<tr>
            <td class="title" colspan="2"><br />Database Connectors</td>
</tr>
<tr>
            <td class="item" colspan="2"><p>The next tests check for database support compiled with php. We use the ADODB database abstraction layer which comes with drivers for
     many databases. Consult the ADODB documentation for details. <p>For the moment only MySQL is fully supported, so you need to make sure it
     is available.</td>
</tr>
<tr>
 <td class="item"><li>iBase Support</li></td>
  <td align="left"><?php echo ( function_exists( 'ibase_connect' ) && function_exists( 'ibase_server_info' )) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.ibase_server_info().')</span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>Informix Support</li></td>
  <td align="left"><?php echo function_exists( 'ifx_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> </span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>LDAP Support</li></td>
  <td align="left"><?php echo function_exists( 'ldap_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> </span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>mSQL Support</li></td>
  <td align="left"><?php echo function_exists( 'msql_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"></span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>M$SQL Support</li></td>
  <td align="left"><?php echo function_exists( 'mssql_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"></span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>MySQL Support</li></td>
  <td align="left"><?php echo function_exists( 'mysql_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.mysql_get_server_info().')</span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>ODBC Support</li></td>
  <td align="left"><?php echo function_exists( 'odbc_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"></span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>Oracle Support</li></td>
  <td align="left"><?php echo function_exists( 'oci_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.ociserverversion().')</span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>PostgreSQL Support</li></td>
  <td align="left"><?php echo function_exists( 'pg_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"></span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>SQLite Support</li></td>
  <td align="left"><?php echo function_exists( 'sqlite_open' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.sqlite_libversion().')</span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
 <td class="item"><li>Sybase Support</li></td>
  <td align="left"><?php echo function_exists( 'sybase_connect' ) ? '<b class="ok">'.$okImg.'</b><span class="item"> </span>' : '<span class="warning">'.$failedImg.' Not available</span>';?></td>
</tr>
<tr>
            <td class="title" colspan="2"><br />Check for Directory and File Permissions</td>
</tr>
<tr>
            <td class="item" colspan="2">If the message 'World Writable' appears after a file/directory, then Permissions for this File have been set to allow all users to write to this file/directory.
            Consider changing this to a more restrictive setting to improve security. You will need to do this manually.</td>
</tr>
<?php
$okMessage="";
if ( (file_exists( $cfgFile ) && !is_writable( $cfgFile )) || (!file_exists( $cfgFile ) && !(is_writable( $cfgDir ))) ) {

        @chmod( $cfgFile, $chmod );
        @chmod( $cfgDir, $chmod );
 $filemode = @fileperms($cfgFile);
 if ($filemode & 2)
         $okMessage="<span class='error'> World Writable</span>";

 }
?>
<tr>
            <td class="item">./includes/config.php writable?</td>
            <td align="left"><?php echo ( is_writable( $cfgFile ) || is_writable( $cfgDir ))  ? '<b class="ok">'.$okImg.'</b>'.$okMessage : '<b class="error">'.$failedImg.'</b><span class="warning"> Configuration process can still be continued. Configuration file will be displayed at the end, just copy & paste this and upload.</span>';?></td>
</tr>
<?php
$okMessage="";
if (is_writable( $filesDir )) {

        @chmod( $filesDir, $chmod );
 $filemode = @fileperms($filesDir);
 if ($filemode & 2)
         $okMessage="<span class='error'> World Writable</span>";

 }
?>
<tr>
            <td class="item">./files writable?</td>
            <td align="left"><?php echo is_writable( $filesDir ) ? '<b class="ok">'.$okImg.'</b>'.$okMessage : '<b class="error">'.$failedImg.'</b><span class="warning"> File upload functionality will be disabled</span>';?></td>
</tr>
<?php
$okMessage="";
if (is_writable( $tmpDir )) {

        @chmod( $tmpDir, $chmod );
 $filemode = @fileperms($tmpDir);
 if ($filemode & 2)
         $okMessage="<span class='error'> World Writable</span>";

 }
?>
<tr>
            <td class="item">./files/temp writable?</td>
            <td align="left"><?php echo is_writable( $tmpDir ) ? '<b class="ok">'.$okImg.'</b>'.$okMessage : '<b class="error">'.$failedImg.'</b><span class="warning"> PDF report generation will be disabled</span>';?></td>
</tr>
<?php
$okMessage="";
if (is_writable( $locEnDir )) {

        @chmod( $locEnDir, $chmod );
	$filemode = @fileperms($locEnDir);
	if ($filemode & 2)
	        $okMessage="<span class='error'> World Writable</span>";

 }
?>
<tr>
            <td class="item">./locales/en writable?</td>
            <td align="left"><?php echo is_writable( $locEnDir ) ? '<b class="ok">'.$okImg.'</b>'.$okMessage : '<b class="error">'.$failedImg.'</b><span class="warning"> Translation files cannot be saved. Check /locales and subdirectories for permissions.</span>';?></td>
</tr>
<tr>
            <td class="title" colspan="2"><br/>Recommended PHP Settings</td>
</tr>
<tr>
            <td class="item">Safe Mode = OFF?</td>
            <td align="left"><?php echo !get_cfg_var('safe_mode') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b><span class="warning"></span>';?></td>
</tr>
<tr>
            <td class="item">Register Globals = OFF?</td>
            <td align="left"><?php echo !get_cfg_var('register_globals') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b><span class="warning"></span>';?></td>
</tr>
<tr>
            <td class="item">Session AutoStart = ON?</td>
            <td align="left"><?php echo get_cfg_var('session.auto_start') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b><span class="warning"> Try setting to ON if you are experiencing a WhiteScreenOfDeath</span>';?></td>
</tr>
<tr>
            <td class="item">Session Use Cookies = ON?</td>
            <td align="left"><?php echo get_cfg_var('session.use_cookies') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b><span class="warning"> Try setting to ON if you are experiencing problems to log in</span>';?></td>
</tr>
<tr>
            <td class="item">Session Use Trans Sid = OFF?</td>
            <td align="left"><?php echo !get_cfg_var('session.use_cookies') ? '<b class="ok">'.$okImg.'</b>' : '<b class="error">'.$failedImg.'</b><span class="warning"> There are security risks with this turned ON</span>';?></td>
</tr>
<tr>
            <td class="title" colspan="2"><br/>Other Recommendations</td>
</tr>
<tr>
            <td class="item" colspan="2">
						<p>The dotProject team openly recommend Free Open Source software (FOSS).  This is not just
						because dotProject is a FOSS application, but because we believe that the FOSS development
						method results in better software, with a lower Total Cost of Ownership (TCO).
						<p>These recommendations reflect that belief, and the fact that as FOSS developers, we
						develop on FOSS systems, so they will have better support sooner than other non-FOSS
						systems.
						</td>
</tr>
<tr>
            <td class="item">Free Operating System?</td>
            <td align="left"><?php echo (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.php_uname().')</span>' : '<b class="error">'.$failedImg.'</b><span class="warning">
            It seems you are using a proprietary operating system.  You might want to consider a Free Open Source operating system such as Linux.  dotProject is usually tested on Linux first and will always have better support for Linux than other operating systems.
            </span>';?></td>
</tr>
<tr>
            <td class="item">Supported Web Server?</td>
            <td align="left"><?php echo (stristr($_SERVER['SERVER_SOFTWARE'], 'apache') != false) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.$_SERVER['SERVER_SOFTWARE'].')</span>' : '<b class="error">'.$failedImg.'</b><span class="warning">
            It seems you are using an unsupported web server.  Only Apache Web server is fully supported by dotProject, and using other web servers may result in unexpected problems.
            </span>';?></td>
</tr>
<tr>
            <td class="item">Standards Compliant Browser?</td>
            <td align="left"><?php echo (stristr($_SERVER['HTTP_USER_AGENT'], 'msie') == false) ? '<b class="ok">'.$okImg.'</b><span class="item"> ('.$_SERVER['HTTP_USER_AGENT'].')</span>' : '<b class="error">'.$failedImg.'</b><span class="warning">
            It seems you are using Internet Explorer.  This browser has many known security risks and is not standards compliant.  Consider using a browser such as Firefox - the dotProject team in the main develops for Firefox first.
            </span>';?></td>
</tr>
</table>
