<?php

declare(strict_types=1);


namespace XoopsModules\Wgdiaries;

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgDiaries module for xoops
 *
 * @copyright      2020 XOOPS Project (https://xooops.org)
 * @license        GPL 2.0 or later
 * @package        wgdiaries
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         wedega - Email:<webmaster@wedega.com> - Website:<https://xoops.wedega.com>
 */

use XoopsModules\Wgdiaries;


/**
 * Class Object Handler Files
 */
class FilesHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgdiaries_files', Files::class, 'file_id', 'file_itemid');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $i field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($i = null, $fields = null)
    {
        return parent::get($i, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Files in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountFiles($start = 0, $limit = 0, $sort = 'file_id ASC, file_itemid', $order = 'ASC')
    {
        $crCountFiles = new \CriteriaCompo();
        $crCountFiles = $this->getFilesCriteria($crCountFiles, $start, $limit, $sort, $order);
        return $this->getCount($crCountFiles);
    }

    /**
     * Get All Files in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllFiles($start = 0, $limit = 0, $sort = 'file_id ASC, file_itemid', $order = 'ASC')
    {
        $crAllFiles = new \CriteriaCompo();
        $crAllFiles = $this->getFilesCriteria($crAllFiles, $start, $limit, $sort, $order);
        return $this->getAll($crAllFiles);
    }

    /**
     * Get Criteria Files
     * @param        $crFiles
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getFilesCriteria($crFiles, $start, $limit, $sort, $order)
    {
        $crFiles->setStart($start);
        $crFiles->setLimit($limit);
        $crFiles->setSort($sort);
        $crFiles->setOrder($order);
        return $crFiles;
    }
}
