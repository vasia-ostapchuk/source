﻿
INSERT INTO `permission` (`id`, `module`, `action`, `alias`) VALUES
	(1, 'admin', 'ajax', 'admin_ajax_filter'),
	(2, 'filter', 'country', 'filter_country_select'),
	(3, 'filter', 'city', 'filter_cyti_select'),
	(4, 'filter', 'style', 'filter_style_select'),
	(5, 'filter', 'genre', 'filter_genre_select'),
	(6, 'filter', 'calendar', 'filter_calendar_select_date'),
	(7, 'filter', 'price', 'filter_price_change'),
	(8, 'filter', 'sort_by_date', 'filter_sort_by_date filter_events'),
	(9, 'filter', 'sort_by_popularity', 'filter_sort_by_popularity filter_events'),
	(10, 'site', 'index', 'site_index_home_page'),
	(11, 'site', 'login', 'site_login_user_login'),
	(12, 'site', 'logout', 'site_logout_user_logout'),
	(13, 'site', 'signup', 'site_signup_user_singup'),
	(14, 'site', 'ajax', 'site_ajax_filter'),
	(15, 'site', 'search', 'site_search_system');
