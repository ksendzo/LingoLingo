<?php 
/**
 * Miloš Jovanović 2013/0669
 * Ksenija Bulatović 2019/0730
**/

namespace App\Models;
use CodeIgniter\Model;

/**
* AccountStatusModel – klasa za komunikaciju sa tabelom 'accountstatuses' iz baze
*
* @version 1.0
*/
class AccountStatusModel extends Model
{
    /**
    * Login funkcija koja dohvata Status Name na osnovu id-a
    *
    * @param Request $id id
    *
    * @return StatusName
    *
    */
    public function GetStatusNameByID($id)
    {
        if( !isset($id))
        {
            return null;
        }
        
        $builder = $this->db->table('accountstatuses');
        $builder->select("*");
        $builder->where('IdStatus', $id);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->StatusName;
    }
    
    
    /**
    * GetStatusIDByName funkcija dohvata StatusId na osnovu statusName-a
    *
    * @param Request $statusName Status Name
    *
    * @return IdStatus
    *
    * @throws BadRequestHttpException
    * @throws UnauthorizedHttpException
    *
    */
    public function GetStatusIDByName($statusName)
    {
        if( !isset($statusName))
        {
            return null;
        }
        
        $builder = $this->db->table('accountstatuses');
        $builder->select("*");
        $builder->where('StatusName', $statusName);
        
        $result = $builder->get()->getResultObject();
        return $result[0]->IdStatus;
    }
    
}