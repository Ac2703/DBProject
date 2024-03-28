import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './pages/App.jsx'
import './assets/css/index.css'
import HomePage from './pages/HomePage.jsx'

import Register from './pages/Register.jsx'
import {createBrowserRouter, RouterProvider, Route} from "react-router-dom"

const router = createBrowserRouter([
    {
        path: "/",
        element: <App/>

    }, {
        path: "Register",
        element: <Register/>

    },
    {
        path: "HomePage",
        element: <HomePage/>

    },
])

ReactDOM
    .createRoot(document.getElementById('root'))
    .render(
        <React.StrictMode>
        <RouterProvider router={router}/>
    </React.StrictMode>,)
