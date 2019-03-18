<?php

namespace tests\phpunit;

use weitzman\DrupalTestTraits\ExistingSiteBase;
use Drupal\user\Entity\Role;

/**
 * A test to confirm that roles are associated with the correct permissions.
 */
class SecurityRolesPermissions extends ExistingSiteBase {

  /**
   * Test method to deterine role are associated with the expected permissions.
   *
   * @group security
   * @group all
   * Disable until we better automate permission changes.
   * @group disabled
   *
   * @dataProvider expectedPerms
   */
  public function testSecurityRolesPermissions($roleMatch, $expectedPerms) {
    $role = Role::load($roleMatch);
    $permissions = NULL;

    if (isset($role)) {
      $permissions = $role->getPermissions();
      $message = "The permissions for the " . $roleMatch . " do not match the expected permissions: \n '" . implode("',\n '", $permissions) . "'\n";
    }
    else {
      $message = 'The ' . $roleMatch . ' role is missing from the system.';
    }

    // Test assertion.
    $match = ($expectedPerms == $permissions);

    $this->assertTrue($match, $message);
  }

  /**
   * Returns expected roles amd associated permissions.
   *
   * @return array
   *   Array containing all the roles in the system as an array
   */
  public function expectedPerms() {
    return [
      [
        'anonymous',
        [
          'access content',
          'access site-wide contact form',
          'view media',
          'view paragraph content address',
          'view paragraph content alert',
          'view paragraph content collapsible_panel',
          'view paragraph content collapsible_panel_item',
          'view paragraph content expandable_text',
          'view paragraph content health_care_local_facility_servi',
          'view paragraph content link_teaser',
          'view paragraph content list_of_link_teasers',
          'view paragraph content number_callout',
          'view paragraph content process',
          'view paragraph content q_a',
          'view paragraph content q_a_section',
          'view paragraph content react_widget',
          'view paragraph content spanish_translation_summary',
          'view paragraph content starred_horizontal_rule',
          'view paragraph content wysiwyg',
        ],
      ],
      [
        'authenticated',
        [
          'access content',
          'access environment indicator',
          'access site-wide contact form',
          'execute graphql requests',
          'execute persisted graphql requests',
          'view media',
          'view paragraph content address',
          'view paragraph content alert',
          'view paragraph content collapsible_panel',
          'view paragraph content collapsible_panel_item',
          'view paragraph content expandable_text',
          'view paragraph content health_care_local_facility_servi',
          'view paragraph content link_teaser',
          'view paragraph content list_of_link_teasers',
          'view paragraph content number_callout',
          'view paragraph content process',
          'view paragraph content q_a',
          'view paragraph content q_a_section',
          'view paragraph content react_widget',
          'view paragraph content spanish_translation_summary',
          'view paragraph content starred_horizontal_rule',
          'view paragraph content wysiwyg',
        ],
      ],
      [
        'content_api_consumer',
        [
          'use graphql explorer',
          'use graphql voyager',
          'view any unpublished content',
          'view own unpublished content',
          'view paragraph content number_callout',
        ],
      ],
      [
        'content_editor',
        [
          'access administration pages',
          'access content overview',
          'access image_browser entity browser pages',
          'access media overview',
          'access media_browser entity browser pages',
          'access shortcuts',
          'access toolbar',
          'access user profiles',
          'create alert block content',
          'create document media',
          'create event content',
          'create health_care_local_facility content',
          'create image media',
          'create landing_page content',
          'create media',
          'create news_story content',
          'create outreach_asset content',
          'create page content',
          'create paragraph content address',
          'create paragraph content alert',
          'create paragraph content collapsible_panel',
          'create paragraph content collapsible_panel_item',
          'create paragraph content expandable_text',
          'create paragraph content health_care_local_facility_servi',
          'create paragraph content link_teaser',
          'create paragraph content list_of_link_teasers',
          'create paragraph content number_callout',
          'create paragraph content process',
          'create paragraph content q_a',
          'create paragraph content q_a_section',
          'create paragraph content react_widget',
          'create paragraph content spanish_translation_summary',
          'create paragraph content starred_horizontal_rule',
          'create paragraph content wysiwyg',
          'create person_profile content',
          'create press_release content',
          'create promo block content',
          'create regional_health_care_service_des content',
          'create support_service content',
          'create video media',
          'delete media',
          'delete paragraph content address',
          'delete paragraph content alert',
          'delete paragraph content collapsible_panel',
          'delete paragraph content collapsible_panel_item',
          'delete paragraph content expandable_text',
          'delete paragraph content health_care_local_facility_servi',
          'delete paragraph content link_teaser',
          'delete paragraph content list_of_link_teasers',
          'delete paragraph content number_callout',
          'delete paragraph content process',
          'delete paragraph content q_a',
          'delete paragraph content q_a_section',
          'delete paragraph content react_widget',
          'delete paragraph content spanish_translation_summary',
          'delete paragraph content starred_horizontal_rule',
          'delete paragraph content wysiwyg',
          'edit any document media',
          'edit any event content',
          'edit any health_care_local_facility content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any image media',
          'edit any landing_page content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any regional_health_care_service_des content',
          'edit any support_service content',
          'edit any video media',
          'edit own event content',
          'edit own health_care_local_facility content',
          'edit own health_care_region_detail_page content',
          'edit own health_care_region_page content',
          'edit own landing_page content',
          'edit own news_story content',
          'edit own office content',
          'edit own outreach_asset content',
          'edit own page content',
          'edit own person_profile content',
          'edit own press_release content',
          'edit own regional_health_care_service_des content',
          'edit own support_service content',
          'schedule editorial transition create_new_draft',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'update paragraph content address',
          'update paragraph content alert',
          'update paragraph content collapsible_panel',
          'update paragraph content collapsible_panel_item',
          'update paragraph content expandable_text',
          'update paragraph content health_care_local_facility_servi',
          'update paragraph content link_teaser',
          'update paragraph content list_of_link_teasers',
          'update paragraph content number_callout',
          'update paragraph content process',
          'update paragraph content q_a',
          'update paragraph content q_a_section',
          'update paragraph content react_widget',
          'update paragraph content spanish_translation_summary',
          'update paragraph content starred_horizontal_rule',
          'update paragraph content wysiwyg',
          'use editorial transition archived_published',
          'use editorial transition create_new_draft',
          'use editorial transition review',
          'use moderation dashboard',
          'use text format rich_text',
          'use workbench access',
          'view all media revisions',
          'view all revisions',
          'view any unpublished content',
          'view event revisions',
          'view health_care_local_facility revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view landing_page revisions',
          'view latest version',
          'view news_story revisions',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view paragraph content number_callout',
          'view person_profile revisions',
          'view press_release revisions',
          'view regional_health_care_service_des revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view workbench access information',
        ],
      ],
      [
        'content_reviewer',
        [
          'access administration pages',
          'access content overview',
          'access image_browser entity browser pages',
          'access media overview',
          'access media_browser entity browser pages',
          'access shortcuts',
          'access toolbar',
          'access user profiles',
          'create alert block content',
          'create document media',
          'create event content',
          'create health_care_local_facility content',
          'create image media',
          'create landing_page content',
          'create media',
          'create news_story content',
          'create outreach_asset content',
          'create page content',
          'create paragraph content address',
          'create paragraph content alert',
          'create paragraph content collapsible_panel',
          'create paragraph content collapsible_panel_item',
          'create paragraph content expandable_text',
          'create paragraph content health_care_local_facility_servi',
          'create paragraph content link_teaser',
          'create paragraph content list_of_link_teasers',
          'create paragraph content number_callout',
          'create paragraph content process',
          'create paragraph content q_a',
          'create paragraph content q_a_section',
          'create paragraph content react_widget',
          'create paragraph content spanish_translation_summary',
          'create paragraph content starred_horizontal_rule',
          'create paragraph content wysiwyg',
          'create person_profile content',
          'create press_release content',
          'create promo block content',
          'create regional_health_care_service_des content',
          'create support_service content',
          'create video media',
          'delete media',
          'delete paragraph content address',
          'delete paragraph content alert',
          'delete paragraph content collapsible_panel',
          'delete paragraph content collapsible_panel_item',
          'delete paragraph content expandable_text',
          'delete paragraph content health_care_local_facility_servi',
          'delete paragraph content link_teaser',
          'delete paragraph content list_of_link_teasers',
          'delete paragraph content number_callout',
          'delete paragraph content process',
          'delete paragraph content q_a',
          'delete paragraph content q_a_section',
          'delete paragraph content react_widget',
          'delete paragraph content spanish_translation_summary',
          'delete paragraph content starred_horizontal_rule',
          'delete paragraph content wysiwyg',
          'edit any document media',
          'edit any event content',
          'edit any health_care_local_facility content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any image media',
          'edit any landing_page content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any regional_health_care_service_des content',
          'edit any support_service content',
          'edit any video media',
          'edit own event content',
          'edit own health_care_local_facility content',
          'edit own health_care_region_detail_page content',
          'edit own health_care_region_page content',
          'edit own landing_page content',
          'edit own news_story content',
          'edit own office content',
          'edit own outreach_asset content',
          'edit own page content',
          'edit own person_profile content',
          'edit own press_release content',
          'edit own regional_health_care_service_des content',
          'edit own support_service content',
          'schedule editorial transition create_new_draft',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'update paragraph content address',
          'update paragraph content alert',
          'update paragraph content collapsible_panel',
          'update paragraph content collapsible_panel_item',
          'update paragraph content expandable_text',
          'update paragraph content health_care_local_facility_servi',
          'update paragraph content link_teaser',
          'update paragraph content list_of_link_teasers',
          'update paragraph content number_callout',
          'update paragraph content process',
          'update paragraph content q_a',
          'update paragraph content q_a_section',
          'update paragraph content react_widget',
          'update paragraph content spanish_translation_summary',
          'update paragraph content starred_horizontal_rule',
          'update paragraph content wysiwyg',
          'use editorial transition archived_published',
          'use editorial transition create_new_draft',
          'use editorial transition review',
          'use editorial transition stage_for_publishing',
          'use moderation dashboard',
          'use text format rich_text',
          'use workbench access',
          'view all media revisions',
          'view all revisions',
          'view any unpublished content',
          'view event revisions',
          'view health_care_local_facility revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view landing_page revisions',
          'view latest version',
          'view news_story revisions',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view paragraph content number_callout',
          'view person_profile revisions',
          'view press_release revisions',
          'view regional_health_care_service_des revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view workbench access information',
        ],
      ],
      [
        'content_publisher',
        [
          'access administration pages',
          'access content overview',
          'access image_browser entity browser pages',
          'access media overview',
          'access media_browser entity browser pages',
          'access shortcuts',
          'access toolbar',
          'access user profiles',
          'create alert block content',
          'create document media',
          'create event content',
          'create health_care_local_facility content',
          'create health_care_region_detail_page content',
          'create health_care_region_page content',
          'create image media',
          'create landing_page content',
          'create media',
          'create news_story content',
          'create office content',
          'create outreach_asset content',
          'create page content',
          'create paragraph content address',
          'create paragraph content alert',
          'create paragraph content collapsible_panel',
          'create paragraph content collapsible_panel_item',
          'create paragraph content expandable_text',
          'create paragraph content health_care_local_facility_servi',
          'create paragraph content link_teaser',
          'create paragraph content list_of_link_teasers',
          'create paragraph content number_callout',
          'create paragraph content process',
          'create paragraph content q_a',
          'create paragraph content q_a_section',
          'create paragraph content react_widget',
          'create paragraph content spanish_translation_summary',
          'create paragraph content starred_horizontal_rule',
          'create paragraph content wysiwyg',
          'create person_profile content',
          'create press_release content',
          'create promo block content',
          'create regional_health_care_service_des content',
          'create support_service content',
          'create terms in health_care_service_taxonomy',
          'create video media',
          'delete any alert block content',
          'delete any document media',
          'delete any event content',
          'delete any health_care_local_facility content',
          'delete any health_care_region_detail_page content',
          'delete any health_care_region_page content',
          'delete any image media',
          'delete any landing_page content',
          'delete any media',
          'delete any news_story content',
          'delete any office content',
          'delete any outreach_asset content',
          'delete any page content',
          'delete any person_profile content',
          'delete any press_release content',
          'delete any promo block content',
          'delete any regional_health_care_service_des content',
          'delete any support_service content',
          'delete any video media',
          'delete media',
          'delete own document media',
          'delete own event content',
          'delete own health_care_local_facility content',
          'delete own health_care_region_detail_page content',
          'delete own health_care_region_page content',
          'delete own image media',
          'delete own landing_page content',
          'delete own news_story content',
          'delete own office content',
          'delete own outreach_asset content',
          'delete own page content',
          'delete own person_profile content',
          'delete own press_release content',
          'delete own regional_health_care_service_des content',
          'delete own support_service content',
          'delete own video media',
          'delete paragraph content address',
          'delete paragraph content alert',
          'delete paragraph content collapsible_panel',
          'delete paragraph content collapsible_panel_item',
          'delete paragraph content expandable_text',
          'delete paragraph content health_care_local_facility_servi',
          'delete paragraph content link_teaser',
          'delete paragraph content list_of_link_teasers',
          'delete paragraph content number_callout',
          'delete paragraph content process',
          'delete paragraph content q_a',
          'delete paragraph content q_a_section',
          'delete paragraph content react_widget',
          'delete paragraph content spanish_translation_summary',
          'delete paragraph content starred_horizontal_rule',
          'delete paragraph content wysiwyg',
          'delete terms in health_care_service_taxonomy',
          'edit any document media',
          'edit any event content',
          'edit any health_care_local_facility content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any image media',
          'edit any landing_page content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any regional_health_care_service_des content',
          'edit any support_service content',
          'edit any video media',
          'edit own document media',
          'edit own event content',
          'edit own health_care_local_facility content',
          'edit own health_care_region_detail_page content',
          'edit own health_care_region_page content',
          'edit own image media',
          'edit own landing_page content',
          'edit own news_story content',
          'edit own office content',
          'edit own outreach_asset content',
          'edit own page content',
          'edit own person_profile content',
          'edit own press_release content',
          'edit own regional_health_care_service_des content',
          'edit own support_service content',
          'edit own video media',
          'edit terms in health_care_service_taxonomy',
          'revert all revisions',
          'revert event revisions',
          'revert health_care_local_facility revisions',
          'revert health_care_region_detail_page revisions',
          'revert health_care_region_page revisions',
          'revert landing_page revisions',
          'revert news_story revisions',
          'revert office revisions',
          'revert outreach_asset revisions',
          'revert page revisions',
          'revert person_profile revisions',
          'revert press_release revisions',
          'revert regional_health_care_service_des revisions',
          'revert support_service revisions',
          'schedule editorial transition archive',
          'schedule editorial transition archived_published',
          'schedule editorial transition create_new_draft',
          'schedule editorial transition publish',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'update paragraph content address',
          'update paragraph content alert',
          'update paragraph content collapsible_panel',
          'update paragraph content collapsible_panel_item',
          'update paragraph content expandable_text',
          'update paragraph content health_care_local_facility_servi',
          'update paragraph content link_teaser',
          'update paragraph content list_of_link_teasers',
          'update paragraph content number_callout',
          'update paragraph content process',
          'update paragraph content q_a',
          'update paragraph content q_a_section',
          'update paragraph content react_widget',
          'update paragraph content spanish_translation_summary',
          'update paragraph content starred_horizontal_rule',
          'update paragraph content wysiwyg',
          'use editorial transition archive',
          'use editorial transition archived_published',
          'use editorial transition create_new_draft',
          'use editorial transition publish',
          'use editorial transition review',
          'use editorial transition stage_for_publishing',
          'use moderation dashboard',
          'use text format rich_text',
          'use workbench access',
          'view all media revisions',
          'view all revisions',
          'view any moderation dashboard',
          'view any unpublished content',
          'view event revisions',
          'view health_care_local_facility revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view landing_page revisions',
          'view latest version',
          'view news_story revisions',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view paragraph content number_callout',
          'view person_profile revisions',
          'view press_release revisions',
          'view regional_health_care_service_des revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view workbench access information',
        ],
      ],
      [
        'admnistrator_users',
        [
          'access shortcuts',
          'access toolbar',
          'administer users',
          'assign content_api_consumer role',
          'assign content_editor role',
          'assign content_publisher role',
          'assign content_reviewer role',
          'assign selected workbench access',
          'batch update workbench access',
          'bypass password policies',
          'bypass workbench access',
          'create terms in administration',
          'delete terms in administration',
          'edit terms in administration',
          'manage password reset',
          'use moderation dashboard',
          'use text format rich_text',
          'view any moderation dashboard',
          'view workbench access information',
        ],
      ],
    ];
  }

}
