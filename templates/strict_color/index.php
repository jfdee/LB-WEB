<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Strict_color
 * 
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access.
defined('_JEXEC') or die;
// Get params
$logo = $this->params->get('logo');
$color = $this->params->get('templatecolor');
// Output as HTML5
$this->setHtml5(true);
$template_path = $this->baseurl . '/templates/' . $this->template;
$color = $this->params->get('templatecolor');
$this->addStyleSheet(
$this->baseurl . '/templates/' .
$this->template . '/css/' .
htmlspecialchars($color, ENT_COMPAT, 'UTF-8') .
'.css', 'text/css', 'screen'
);
?>

<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml"  
  xml:lang="<?php echo $this->language; ?>" 
  lang="<?php echo $this->language; ?>" 
  dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo $template_path; ?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $template_path; ?>/css/mystyle.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $template_path; ?>/css/<?php echo htmlspecialchars($color, ENT_COMPAT, 'UTF-8')?>.css" type="text/css" />
</head>
<body>
	<!-- Шапка -->
	<header>
		<div class="row">
        <!-- Логотип -->
				<div class="col-md-8">
					<jdoc:include type="modules" name="pos-logo"/>
				</div>
		 <!-- Меню --> 
				<div class="col-md-4">
					<jdoc:include type="modules" name="pos-menu"/>
				</div>
		</div>	
    </header>
	<!-- Основная часть -->
	<main>
		<div class="row">
		<div class="col-md-8">
		<div class="row">
			<div class="col-md-12" id="content"><jdoc:include type="component" /></div>
		</div>
		<div class="row">
			<div class="col-md-12" id="breadcrumb"><jdoc:include type="modules" name="pos-breadcrumb" /></div>
		</div>
		</div>
		<div class="col-md-4" id="modules"> 
			<div id="box1"><jdoc:include type="modules" name="pos-1" /></div>
			<div id="box2"><jdoc:include type="modules" name="pos-2" /></div>
			<div id="box3"><jdoc:include type="modules" name="pos-3" /></div>
		</div>
		</div>
	</main>
	<footer>
        <div class="row" id="footer">
           <div class="col-md-12"><jdoc:include type="modules" name="pos-footer" />
		   </div>
        </div>
    </footer> 
</body>
</html>