# Joomla Authentication plugin

## Validate credentials then perform action before the user is actually logged in

A simple nifty plugin that would run after validating the user against the database but before logging the user in (or denying it on any other grounds).

In this particular case, the plugin is used to redirect the user to the login page after a non-activated user tries to login.

If you are wondering if Joomla doesn't do that already, the answer is "yes, but only if you have no "redirect after login" menu item set in the login module or menu. This plugin allows you to take control of that behavior.
