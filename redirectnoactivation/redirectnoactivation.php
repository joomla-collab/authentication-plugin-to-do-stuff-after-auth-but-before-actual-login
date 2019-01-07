<?php
/**
 * @package            Joomla
 * @subpackage         Authentication Plugin
 * @author             Jonathan Magoga
 * @copyright          Copyright (C) 2010 - 2050 Jonathan Magoga
 * @license            GNU/GPL, see https://www.gnu.org/licenses/gpl.html
 */

defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');
class PlgAuthenticationRedirectnoactivation extends JPlugin
{
	function onUserAuthenticate(&$credentials, $options, &$response)
	{
		$db = JFactory::getDbo();
		$q	= $db->getQuery(true);
		$q->select('block');
		$q->from('#__users');
		$q->where('email=' . $db->quote($credentials['username']));
		$db->setQuery($q);
		$userBlock = $db->loadResult();

		if ($userBlock == 1)
		{
			$redi = JRoute::_('index.php?option=com_users&view=login');
			$app = JFactory::getApplication();
			$app->enqueueMessage(JText::_('JERROR_NOLOGIN_BLOCKED'), 'warning');
			$app->setRedirect($redirect);
			$app->close();
			exit;
		}
	}
}
