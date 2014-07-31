<?php
/**
 * Creates wizard pages for the 'Delete Posts' action.
 * 
 * @package     Task Scheduler
 * @copyright   Copyright (c) 2014, Michael Uno
 * @author		Michael Uno
 * @authorurl	http://michaeluno.jp
 * @since		1.0.0
 */

final class TaskScheduler_Action_PostDeleter_Wizard_2 extends TaskScheduler_Wizard_Action_Base {

	/**
	 * Returns the field definition arrays.
	 * 
	 * @remark		The field definition structure must follows the specification of Admin Page Framework v3.
	 */ 
	public function getFields() {

		$_aWizardOptions = apply_filters( 'task_scheduler_admin_filter_get_wizard_options', array(), $this->sSlug );
		return array(
			array(	
				'field_id'			=>	'post_type_label_of_deleting_posts',
				'title'				=>	__( 'Post Type', 'task-scheduler' ),
				'type'				=>	'text',
				'attributes'		=>	array(
					'readonly'	=>	'ReadOnly',
					'name'		=>	'',	// dummy
				),
				'value'				=>	TaskScheduler_WPUtility::getPostTypeLabel( isset( $_aWizardOptions['post_type_of_deleting_posts'] ) ? $_aWizardOptions['post_type_of_deleting_posts'] : null ),
			),			
			array(	
				'field_id'			=>	'post_statuses_of_deleting_posts',
				'title'				=>	__( 'Post Statuses', 'task-scheduler' ),
				'type'				=>	'checkbox',
				'label'				=>	TaskScheduler_WPUtility::getRegisteredPostStatusLabels(),
				'attributes'		=>	array(
					'disabled'	=>	'Disabled',
					'name'		=>	'',	// dummy
				),				
			),	
			array(
				'field_id'			=>	'taxonomy_of_deleting_posts',
				'title'				=>	__( 'Taxonomy', 'task-scheduler' ),
				'type'				=>	'select',
				'label'				=>	array(
					-1	=>	__( 'All Posts', 'task-scheduler' ),
				)
				+ TaskScheduler_WPUtility::getTaxonomiesByPostTypeSlug( isset( $_aWizardOptions['post_type_of_deleting_posts'] ) ? $_aWizardOptions['post_type_of_deleting_posts'] : null ),
			),
		);
		
	}	
		
	public function validateSettings( $aInput, $aOldInput, $oAdminPage ) { 
	
		return $aInput; 		

	}
	
	
}