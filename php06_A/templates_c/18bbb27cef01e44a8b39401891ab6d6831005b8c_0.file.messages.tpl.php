<?php
/* Smarty version 4.3.2, created on 2024-05-20 23:13:12
  from 'D:\xamp\xampPHP\htdocs\php06_A\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_664bbce86e04b0_54895650',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18bbb27cef01e44a8b39401891ab6d6831005b8c' => 
    array (
      0 => 'D:\\xamp\\xampPHP\\htdocs\\php06_A\\app\\views\\templates\\messages.tpl',
      1 => 1716047200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664bbce86e04b0_54895650 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
    <div class="messages err">
        <ol>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <div class="messages inf bottom-margin">
        <ol>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    </div>
    <?php }?>
    <?php }
}
