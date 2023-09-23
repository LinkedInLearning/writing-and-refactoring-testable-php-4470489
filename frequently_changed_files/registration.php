<?php
declare(strict_types=1);

function register()
{
    $blocks_to_register = [
        'about-the-author' => 'About_The_Author\render_about_the_author',
        'archived-news' => 'Archived_News\render_archived_news',
        'article-hero-header' => 'Article_Hero_Header\render_article_hero_header',
        'article-intro' => 'Article_Intro\render_article_intro',
        'ask' => 'Ask\render_ask',
        'bio-intro' => 'Bio_Intro\render_bio_intro',
        'blockquote' => 'Blockquote\render_blockquote',
        'callout' => 'Callout\render_callout',
        'card-carousel' => 'Card_Carousel\render_card_carousel',
        'card-grid' => 'Card_Grid\render_card_grid',
        'centers-and-facilities' => 'Centers_And_Facilities\render_centers_and_facilities',
        'credits-and-details' => 'Credits_And_Details\render_credits_and_details',
        'did-you-know' => 'Did_You_Know\render_did_you_know',
        'encyclopedia-intro-banner' => 'Encyclopedia_Intro_Banner\render_encyclopedia_intro_banner',
        'featured-link' => 'Featured_Link\render_featured_link',
        'featured-link-list' => 'Featured_Link_List\render_featured_link_list',
        'file-list' => 'File_List\render_file_list',
        'featured-image' => 'Featured_Image\render_featured_image',
        'image-of-the-day' => 'Image_of_the_Day\render_image_of_the_day',
        'featured-mission' => 'Featured_Mission\render_featured_mission',
        'featured-story' => 'Featured_Story\render_featured_story',
        'featured-podcasts' => 'Featured_Podcasts\render_featured_podcasts',
        'gallery-preview' => 'Gallery_Preview\render_gallery_preview',
        'hdsnav' => 'HDS_Nav\render_hds_nav',
        'hero-quote' => 'Hero_Quote\render_hero_quote',
        'image-carousel' => 'Image_Carousel\render_image_carousel',
        'news-automated' => 'News\render_news_automated',
        'news-manual' => 'News\render_news_manual',
        'media' => 'Media\render_media',
        'meet-the' => 'Meet_The\render_meet_the',
        'mission-hero' => 'Mission_Hero\render_mission_hero',
        'oversized-text' => 'Oversized_Text\render_oversized_text',
        'page-intro' => 'Page_Intro\render_page_intro',
        'pullquote' => 'Pullquote\render_pullquote',
        'related-articles' => 'Related_Articles\render_related_articles',
        'related-link' => 'Related_Link\render_related_link',
        'secondary-navigation' => 'Secondary_Navigation\render_secondary_navigation',
        'social-media-links' => 'Social_Media_Links\render_social_media_links',
        'story' => 'Story\render_story',
        'subscription-banner' => 'Subscription_Banner\render_subscription_banner',
        'tabbed-section' => 'Tabbed_Section\render_tabbed_section',
        'content-lists' => 'Content_Lists\render_content_lists',
        'topic-cards' => 'Topic_Cards\render_topic_cards',
        'topic-hero' => 'Topic_Hero\render_topic_hero',
        'mag' => 'Mag\render_mag',
        'video' => 'Video\render_video',
        'scrapbook-gallery' => 'Scrapbook_Gallery\render_scrapbook_gallery',
        'feature-intro' => 'Feature_Intro\render_feature_intro',
        'feature-outro' => 'Feature_Outro\render_feature_outro',
        'chapter-divider' => 'Chapter_Divider\render_chapter_divider',
        'fifty-fifty' => 'Fifty_Fifty\render_fifty_fifty',
        'audio-player' => 'Audio_Player\render_audio_player',
        'featured-video' => 'Featured_Video\render_featured_video',
        'live' => 'Live\render_live',
        'live-two-column' => 'Live\render_live_two_column',
    ];

    foreach ($blocks_to_register as $block_name => $callback) {
        register_block_type('hds/' . $block_name, [
            'render_callback' => $callback,
        ]);
    }
}
