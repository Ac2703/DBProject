import Header from "../Header";
import {Link} from 'react-router-dom';

function AddTask() {
    // Potential form submission handler (to be implemented)
    const handleSubmit = (e) => {
        e.preventDefault();
        // Handle your form submission logic here
    };

    return (
        <div>

            <Header/>
            <form onSubmit={handleSubmit}>
                <div id="wut">
                    <input name="task" type="text" placeholder="Enter Task Name"/>
                    <br/><br/>
                    <div id="box1">Due??<input name="p1" type="date"/></div>
                    <br/><div id="box1">Complete?<input name="p1" type="checkbox"/></div>
                    <br/>
                    <input name="p1" type="tel" placeholder="Enter Description"/>
                    <br/><br/>
                    <input name="p2" type="password" placeholder="Tag?"/>
                    <br/><br/><br/> {/* Corrected Link usage for navigation */}
                    <Link to='/homePage'>
                        <button type="submit" id="button">Add Task</button>
                    </Link>
                </div>
            </form>

        </div>
    );

}

export default AddTask