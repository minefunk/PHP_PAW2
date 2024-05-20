<?php
/* Smarty version 4.3.2, created on 2024-05-20 23:13:12
  from 'D:\xamp\xampPHP\htdocs\php06_A\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_664bbce866cd17_02260334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14cd0a3748b90bcbfafef5ee55a6e3afb95f2643' => 
    array (
      0 => 'D:\\xamp\\xampPHP\\htdocs\\php06_A\\app\\views\\templates\\main.tpl',
      1 => 1716048934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664bbce866cd17_02260334 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (($tmp = $_smarty_tpl->tpl_vars['page_description']->value ?? null)===null||$tmp==='' ? 'Opis domyślny' ?? null : $tmp);?>
">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? 'Kalkulator kredytowy' ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid.css">
    <!--<![endif]-->
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing.css">
    <!--<![endif]-->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
    <?php if ($_smarty_tpl->tpl_vars['hide_intro']->value) {?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style_hide_intro.css">
    <?php }?>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/softscroll.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id="app_top" class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">Kalkulator</a>
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            <li><a href="#app_content">Idź do formularza</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginView" class="pure-button pure-button-primary">Login</a></li>
        </ul>
    </div>
</div>
<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">Kalkulator Kredytowy</h1>
        <p class="splash-subhead">Pomoc w obliczeniu z pomocą tego prostego narzędzia</p>
        <p><a href="#app_content" class="pure-button pure-button-primary">Idź do formularza</a></p>
    </div>
</div>
<div class="content-wrapper">
    <div id="app_content" class="content">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2068513894664bbce866a675_91179509', 'content');
?>

    </div>
    <div class="footer l-box is-center">
        <p>
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_758211260664bbce866ba99_37652018', 'footer');
?>

        </p>
        <p>Widok oparty na stylach i szablonie <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a></p>
    </div>
</div>
</body>
</html>
<?php }
/* {block 'content'} */
class Block_2068513894664bbce866a675_91179509 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2068513894664bbce866a675_91179509',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna treść zawartości....<?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_758211260664bbce866ba99_37652018 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_758211260664bbce866ba99_37652018',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Domyślna treść stopki....<?php
}
}
/* {/block 'footer'} */
}
