import React from "react";
import Header from "../Header";
import { Link } from 'react-router-dom';



function HomePage() {

    return (
        <div>

            <Header/>
            <div id='all-tasks'>
                <p id="all-tasks-text"><Link to='/AllTasks'>
                        <button type="submit" id="AllButton">All Tasks</button>
                    </Link></p>

            </div>

            <hr id="line"></hr>

            <div id='some-tasks'>
                <p id="all-tasks-text"><Link to='/TasksWithTag'>
                        <button type="submit" id="AllButton">With Tag</button>
                    </Link></p>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <Link to="/addTask"> {/* Make sure this path is correct */}
                <button type="button" id='button'>Add Task</button> {/* Removed duplicate id */}
            </Link>                <br/>

                

            <Link to="/Calanderr"> {/* Make sure this path is correct */}
                <button type="button" id='button'>Calander</button> {/* Removed duplicate id */}
            </Link>                 </div>

        </div>
    );
    {}

}

export default HomePage