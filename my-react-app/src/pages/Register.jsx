import { useState } from 'react';
import Header from "../Header";


function Register() {

    const [formData, setFormData] = useState({
        email: '',
        password: ''
      });
    
      const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
      };
    
      const handleSubmit = (e) => {
        e.preventDefault();
        // Assuming your PHP file is named 'register.php'
        const url = 'localhost:5173/dbproject/register.php';
        
        fetch(url, {
          method: 'POST',
          body: JSON.stringify(formData),
          headers: {
            'Content-Type': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          console.log('Success:', data);
          // Handle success scenario, e.g., redirect user or show success message
        })
        .catch(error => {
          console.error('Error:', error);
          // Handle error scenario, e.g., show error message to user
        });
      };

    return (
        <div>
            <div>
                <Header></Header>
            </div>

            <div id="yuh">
      <h2>Registration Form</h2>
      <form onSubmit={handleSubmit}>
        <br />
        <label>
          Email:
          <input
            type="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
          />
        </label>
        <br />
        <label>
          Password:
          <input
            type="password"
            name="password"
            value={formData.password}
            onChange={handleChange}
          />
        </label>
        <br />
        <button type="submit">Register</button>
      </form>
    </div>
        </div>

    );

}

export default Register;
