import React, { useEffect } from 'react';
import logo from './logo.svg';
import {useState} from "react";
import './App.css';
import { isSet } from 'util/types';
import { loadavg } from 'os';



  function App(){
    const data = [{ id:0 ,nome: "Anom", cognome: "Anom", data_nascita: "2005-02-17",codice_fiscale:"RAFWEJ647DSVS",id_classe:0}]
    const [students,setStudents]=useState(data);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);



  
    useEffect(() => {
      fetch(`http://localhost:8080/API/student`)
        .then((response) => response.json())
        .then((actualData) => {
          setStudents(actualData.records)
        });
    }, []);



    return (
        <div className="App">
          <center>
          <table border = {2}>
            <tr>
              <th>Nome</th>
              <th>Cognome</th>
              <th>Codice Fiscale</th>
              <th>Data Nascita</th>
              <th>Elimina</th>
              <th>Modifica</th>
            </tr>
            
            {students.map((val,id) => {
              return (
                <tr key={id}>
                  <td>{val.nome}</td>
                  <td>{val.cognome}</td>
                  <td>{val.codice_fiscale}</td>
                  <td>{val.data_nascita}</td>


                </tr>
              )
            })}
            
            
          </table>
          

          </center>
        </div>
      );
      
  }
  export default App;