<?php

/**
 * LoginView
 *
 * Add a login name to the main interface
 *
 * @license GNU GPLv3+
 * @author Dummy Luck Kiev
 *
 * https://github.com/dummyluck/login_view
 * http://dummyluck.com/page/roundcube_plugin_login_view
 * rndcb@dummyluck.com
 */
class login_view extends rcube_plugin
{

        function init()
        {
                $this->add_hook('render_page', array($this, 'add_login_view'));
        }

        public function add_login_view($arg)
        {
                $addstr = '<script type="text/javascript">';
                $addstr .=   'var cur_logo= document.getElementById(\'logo\');';
                $addstr .=   'cur_logo.setAttribute("style","");';
                $addstr .=   'cur_logo.removeAttribute("style");';
                $addstr .=   'var my_usermail = document.createElement (\'SPAN\');';
                $addstr .=   'my_usermail.innerHTML = \''.$_SESSION['username'].'\';';
//              $addstr .=   'my_usermail.style = "vertical-align:top;margin-left:20px;font-size:1.2em;";';
                $addstr .=   'my_usermail.setAttribute("style","vertical-align:top;margin-left:20px;font-size:1.2em;");';
                $addstr .=   'var parent_cur_logo = cur_logo.parentNode;';
                $addstr .=   'if(typeof cur_logo.nextSibling != \'undefined\')';
                $addstr .=   '        parent_cur_logo.insertBefore(my_usermail, cur_logo.nextSibling);';
                $addstr .=   'else';
                $addstr .=   '       parent_cur_logo.appendChild(my_usermail);';
                $addstr .= '</script>';
                rcmail::get_instance()->output->add_footer( $addstr );
                return $arg;
        }
}

?>
