<?php
# stored procedures estavam me dando uma dor de cabeça. mysql é um motor RUIM. mais vale meu tempo fazer assim

require 'conn.php';
/*
#queries padrão


                    # AUTH BULLSHIT
                    'item_by_uid'  =>   "SELECT * FROM items WHERE uid = $session;",

                    'item_by_id' =>   "SELECT * FROM items WHERE id = $id;",

                    'item_search' =>   "SELECT * FROM items WHERE MATCH(titulo, descr, cat) AGAINST ('*$q*' IN BOOLEAN MODE);"
                );
*/
?>