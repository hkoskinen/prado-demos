<?php
/**
 * Auto generated by prado-cli.php on 2007-04-07 10:44:20.
 */
class PostRecord extends TActiveRecord
{
	const TABLE='posts';

	public $post_id;
	public $author_id;
	public $create_time;
	public $title;
	public $content;
	public $status;

	public $author;

	public static $RELATIONS=array
	(
		'author' => array(self::BELONGS_TO, 'UserRecord'),
	);

	public static function finder($className=__CLASS__)
	{
		return parent::finder($className);
	}
}
?>