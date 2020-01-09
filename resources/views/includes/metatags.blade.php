    <meta name="keywords" content="{{ get_option('site_keywords') }}">
    <meta name="description" content="{{ get_option('site_description') }}">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ get_option('site_title') }}">
    <meta itemprop="description" content="{{ get_option('site_description') }}">
    <meta itemprop="image" content="{{ get_option('site_logo') }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ get_option('site_twitter_handle') }}">
    <meta name="twitter:title" content="{{ get_option('site_title') }}">
    <meta name="twitter:description" content="{{ get_option('site_title') }}">
    <meta name="twitter:creator" content="{{ get_option('site_twitter_handle') }}">
    <meta name="twitter:image" content="{{ get_option('site_logo') }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ get_option('site_title') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('about-us') }}" />
    <meta property="og:image" content="{{ get_option('site_logo') }}" />
    <meta property="og:description" content="{{ get_option('site_title') }}" />
    <meta property="og:site_name" content="{{ get_option('site_name') }}" />