import React from "react";
import Header from "../Header";
import FullCalendar from '@fullcalendar/react'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";


import { Link } from 'react-router-dom';



function Calanderr() {

    return (
        <div>

            <Header/>
<div id="cal">   <FullCalendar
      plugins={[ dayGridPlugin , timeGridPlugin , interactionPlugin]}
      initialView="dayGridMonth"
      headerToolbar={{
        start: "today prev,next", // will normally be on the left. if RTL, will be on the right
        center: "title",
        end: "dayGridMonth,timeGridWeek,timeGridDay", // will normally be on the right. if RTL, will be on the left
      }}
      events={[
        { title: 'Task one', date: '2024-04-20' },// this is a test task 
        
      ]}
      height={'500px'}
    /></div>
          

<div id="go"> <Link to='/homePage'>
                        <button type="submit" id="button">Go Back</button>
                    </Link></div>
        </div>
    );
    {}

}

export default Calanderr