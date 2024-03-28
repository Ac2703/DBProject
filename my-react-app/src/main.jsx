import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './assets/css/index.css'

import Register from './pages/Register.jsx'
import {createBrowserRouter, RouterProvider, Route} from "react-router-dom"

const router = createBrowserRouter([
    {
        path: "/",
        element: <App/>

    }, {
        path: "Register",
        element: <Register/>

    }
])

ReactDOM
    .createRoot(document.getElementById('root'))
    .render(
        <React.StrictMode>
        <RouterProvider router={router}/>
    </React.StrictMode>,)
