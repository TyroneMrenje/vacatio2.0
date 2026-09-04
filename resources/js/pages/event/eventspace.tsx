import React from "react";
import { Head } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";
import EventSpaceSelector from "@/components/event-selector";
import { Event } from "@/types/event";
import { useState, useEffect } from "react";

interface Props{
        event:Event[]
}

export default function EventSpace({event}:Props){

    const[loading, setLoading]=useState(true);

    useEffect(() => {
        setLoading(false)
    }, [])

    return(
        <div className="box-border overflow-hidden scroll-smooth">
        <Head title="Headlines"/>
        <Navbar/>
        <div className="flex relative h-screen w-full items-center justify-center">
           {loading ?
            <div className="h-full w-full animate-pulse animate-bounce bg-gray-600">
            </div> :
            <div className="h-full w-full">
                <img src={`/storage/event/garden/gardehall.jpg`}
                 className="h-screen w-full aspect-square md:aspect-auto object-cover -z-10 brightness-65"
                 onLoad={() => setLoading(false)}/>
            </div>
           }
            <div className="flex flex-col absolute items-center gap-2">
                <h1 className="text-leading md:text-6xl text-4xl font-bold z-10 text-white">Events & Meetings</h1>      
            </div>          
         </div>
         <div className=" flex relative items-center justify-center h-50 text-pretty p-5">
            <div className="w-[80%] text-pretty">
                 <p className="font-medium text-md">Experience exceptional hospitality with Vacatio, where every stay is designed to inspire comfort, relaxation, and unforgettable memories. From elegant accommodations and curated experiences to world-class amenities and event spaces, discover destinations that make every journey truly special.Placeholder for the events page</p>
            </div>
         </div>
         <EventSpaceSelector event={event}/>
         <Footer/>
        </div>
    )
}
