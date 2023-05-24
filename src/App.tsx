import React from 'react';
import logo from './logo.svg';
import {useState} from "react";
import './App.css';
import { isSet } from 'util/types';

const data = [
    { name: "Anom", age: 19, gender: "Male" },
    { name: "Megha", age: 19, gender: "Female" },
    { name: "Subham", age: 25, gender: "Male"},
    { name: "Alessandro", age: 19, gender: "Male"},
    { name: "Mario", age: 25, gender: "Male"},
    { name: "Giovanni", age: 28, gender: "Male"},
  ]

  function App(){

    const [students, setStudents] = useState(data);
    const [showForm, setShowForm] = useState(false);
    const [nome, setName] = useState("");
    const [eta, setAge] = useState("");
    const [sesso, setGender] = useState("");

    const [editFormData, setEditFormData] = useState({
      nome: "",
      eta: "",
      sesso: "",
      
    });

    function elimina(el: String){
      
        setStudents(students.filter(obj => obj.name !== el));
    }

    function aggiungi(){
      let newStudentsArray = students;
      newStudentsArray.push({name: nome, age: parseInt(eta), gender: sesso});
      setStudents(newStudentsArray);
      button();
    }

    function button(){
      if(showForm==false){
        setShowForm(true);
      }
      else{
        setShowForm(false);
      }
    }

    function modify(){
      
      if(showForm==false){
        setShowForm(true);
      }
      else{
        setShowForm(false);
        
      }
      
      
    }

    return (
        <div className="App">
          <center>
          <table border = {2}>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Elimina</th>
              <th>Modifica</th>
            </tr>
            {students.map((val, key) => {
              return (
                <tr key={key}>
                  <td>{val.name}</td>
                  <td>{val.age}</td>
                  <td>{val.gender}</td>
                  <td><button onClick={() => elimina(val.name)}>Delete</button></td>
                  <td><button onClick={() => modify()}>Modify</button></td>
                </tr>
              )
            })}
          </table>
          <button onClick={() => button()}>Inserisci</button>
          {showForm &&
          <form> 

            <br/>
            <br/>
            <input type="text" name="name" onChange={e => setName(e.target.value)}/>
            
            <br/>
            <br/>
            <input type="text" name="age" onChange={e => setAge(e.target.value)}/>
            
            <br/>
            <br/>
            <select name="gender" onChange={e => setGender(e.target.value)}>

              <option value="Male">Male</option>
              <option value="Female">Female</option>
              
            </select>

            <br/>
            <br/>
            <button onClick={()=> aggiungi()}>SALVA</button>

          </form>
          }
          </center>
        </div>
      );
      
  }
  export default App;