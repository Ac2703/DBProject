import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './pages/App.jsx'
import './assets/css/index.css'
import HomePage from './pages/HomePage.jsx'
import AddTask from './pages/AddTask.jsx'
import TasksWithTag from './pages/TasksWithTag.jsx'
import Calanderr from './pages/calander.jsx'
import Register from './pages/Register.jsx'

import {createBrowserRouter, RouterProvider, Route} from "react-router-dom"
import AllTasks from './pages/allTasks.jsx'

const router = createBrowserRouter([
    {
        path: "/",
        element: <App/>

    }, {
        path: "/register",
        element: <Register/>

    }, {
        path: "/homePage",
        element: <HomePage/>

    }, {
        path: "/addTask",
        element: <AddTask/>

    }, {
        path: "/Calanderr",
        element: <Calanderr/>

    }, {
        path: "/AllTasks",
        element: <AllTasks/>

    }, {
        path: "/TasksWithTag",
        element: <TasksWithTag/>

    }
    

])

ReactDOM
    .createRoot(document.getElementById('root'))
    .render(
        <React.StrictMode>
        <RouterProvider router={router}/>
    </React.StrictMode>,)