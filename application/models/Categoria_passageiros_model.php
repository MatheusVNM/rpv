<?php
class Categoria_Passageiros_model extends CI_Model{

public function getCatPassageiros(){

    $query = $this->db->get('categoriapassageiro');
    return $query->result_array();
}

public function getCriterios($id){
    $query = $this->db->get_where('criterios', array('criterios_id_categoria'=>$id));
    return $query->result_array();
}

public function createCategoria($categoriapassageiro_nome, $categoriapassageiro_valordesconto, $criterios_descricao ){

    $data = array(
        'categoriapassageiro_nome' => $categoriapassageiro_nome,
        'categoriapassageiro_valordesconto' => $categoriapassageiro_valordesconto,
    );
    $this->db->insert('categoriaPassageiro', $data);
     
    $categoriaId = $this->db->insert_id();
    
    foreach($criterios_descricao as $umcriterio){
    $data = array(
        'criterios_descricao' => $umcriterio,
        'criterios_id_categoria ' => $categoriaId
    );
    $this->db->insert('criterios', $data);
    }
}

    public function getCategoriaEspecifica($id){
        $query = $this->db->get_where('categoriapassageiro', array('categoriapassageiro_id'=>$id));
        return $query->row_array();
    }

    // tirar duvida com o mathias em relação a 3 tabela
  //  $this
    
  //  return 
//    array('success' => true);
 //       } else {
   //         return array('success' => false);
     //   }





     public function editarCategoriaPassageiro($categoriapassageiro_id, 
     $categoriapassageiro_nome, 
     $categoriapassageiro_valordesconto, 
     $criterios_descricao ){

        $data = array(
            'categoriapassageiro_nome' => $categoriapassageiro_nome,
            'categoriapassageiro_valordesconto' => $categoriapassageiro_valordesconto,
        );
        $this->db->where('categoriapassageiro_id', $categoriapassageiro_id);
        $this->db->update('categoriaPassageiro', $data);
         

        $this->db->where('criterios_id_categoria', $categoriapassageiro_id);
        $this->db->delete('criterios');


        foreach($criterios_descricao as $umcriterio){
        $data = array(
            'criterios_descricao' => $umcriterio,
            'criterios_id_categoria ' => $categoriapassageiro_id
        );
        $this->db->insert('criterios', $data);
        }
    }

}