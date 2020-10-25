<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class NavmenuModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function topMenu()
  {

    $query = $this->db->query("SELECT 
      navmenu.id menu_id,
      navmenu.parent_menu parent_menu_id,
      navmenu.menu menu_title,
      navmenu.content content_id,
      child_id,
      child_order,
      navmenu.alias content_alias
      FROM dev_tmw_menu navmenu
      LEFT JOIN dev_tmw_content contents ON navmenu.content = contents.id
      LEFT JOIN (
        SELECT parent_menu idc, GROUP_CONCAT(id ORDER BY menu_order = 0, menu_order) child_id
        FROM dev_tmw_menu WHERE parent_menu <> '0' GROUP BY parent_menu
      ) child ON child.idc = navmenu.id
      LEFT JOIN (
        SELECT parent_menu odc, GROUP_CONCAT(menu_order ORDER BY menu_order = 0, menu_order) child_order
        FROM dev_tmw_menu WHERE parent_menu <> '0' GROUP BY parent_menu
      ) ochild ON ochild.odc = navmenu.id
      WHERE navmenu.status = '1' AND navmenu.content IS NOT NULL and navmenu.alias is not NULL
      ORDER BY menu_order = 0, menu_order
      ")->result();
    return $query;
  }

  public function neuapixMenu()
  { 
    $query = $this->db->get('lv_tmw_neuapix_menu')->result();
    return $query;
  }
}
