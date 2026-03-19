<?php
session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success');
function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'alert alert-success';
            $icon = (strpos($class, 'danger') !== false) ? 'fa-triangle-exclamation' : 'fa-circle-check';
            $bg = (strpos($class, 'danger') !== false) ? 'rgba(196, 30, 90, 0.05)' : 'rgba(46, 204, 113, 0.05)';
            $color = (strpos($class, 'danger') !== false) ? 'var(--pink)' : '#27ae60';
            $border = (strpos($class, 'danger') !== false) ? 'var(--pink)' : '#2ecc71';

            echo '<div class="' . $class . '" id="msg-flash" style="background: ' . $bg . '; padding: 0.8rem 1.2rem; border-radius: 12px; color: ' . $color . '; margin-bottom: 1.5rem; font-size: 0.85rem; font-weight: 600; display: flex; align-items: center; gap: 0.8rem; border-left: 4px solid ' . $border . ';">
                    <i class="fa-solid ' . $icon . '"></i>
                    <span>' . h($_SESSION[$name]) . '</span>
                  </div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function isLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
