import { Link } from 'react-router-dom';

function Signup() {
    return (
        <div id="yuh">
            <input name="email" type='email' placeholder="Enter Email"></input>

            <br/>
            <br/>

            <input name="p3" type='password' placeholder="Enter Password"></input>
            <br/><br/><br/><br/>
            <Link to="/homePage"> {/* Make sure this path is correct */}
                <button type="button" id='button'>Sign In</button> {/* Removed duplicate id */}
            </Link>

            <br/>
            <Link to='/register'>
                <button type="button" id='button'>Register</button>
            </Link>

        </div>

    );
    
}

export default Signup