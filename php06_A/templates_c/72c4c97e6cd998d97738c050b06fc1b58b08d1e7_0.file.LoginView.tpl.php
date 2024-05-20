<?php
/* Smarty version 4.3.2, created on 2024-05-18 18:15:49
  from 'D:\xamp\xampPHP\htdocs\php06\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6648d435139a11_08759099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72c4c97e6cd998d97738c050b06fc1b58b08d1e7' => 
    array (
      0 => 'D:\\xamp\\xampPHP\\htdocs\\php06\\app\\views\\LoginView.tpl',
      1 => 1716048893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6648d435139a11_08759099 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19920081326648d4350fcfb6_62912647', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_19920081326648d4350fcfb6_62912647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19920081326648d4350fcfb6_62912647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
    <legend>Logowanie do systemu</legend>
    <fieldset>
        <div class="pure-control-group">
            <label for="id_login">Login: </label>
            <input id="id_login" type="text" name="login"/>
        </div>
        <div class="pure-control-group">
            <label for="id_pass">Hasło: </label>
            <input id="id_pass" type="password" name="pass" /><br />
        </div>
        <div class="pure-controls">
            <input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
        </div>
    </fieldset>
</form>
<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block 'content'} */
}
