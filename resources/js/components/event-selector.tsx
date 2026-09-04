import React from "react";
import { useState } from "react";
import axios from "axios";
import { Event } from "@/types/event";
import { Link } from "@inertiajs/react";

interface Props{
    event:Event[];
   
}

export default function EventSpaceSelector({event}:Props){

    const[selectedEventSpace, setSelectedEventSpace]=useState<Event>(event[0]);
    const[EventInfo, setEventInfo]=useState<Event | null>(null);
    const[loading, setLoading]=useState(false);

     async function fetchEventDetails(id:string,event:string){

        if(!id)return
        setLoading(true);

        try{
            const { data } = await axios.get(`/event/${id}/${event}`,{
                headers:{
                    "Content-Type":"application/json"
                },
                params:{
                    id,
                    event
                }
            });
            
            setEventInfo(data)
        }finally{
            setLoading(false)
        }
     }


      function handleEventDetails(id: string, room: string) {
          fetchEventDetails(id, room) 
      }



    return(
        <div className="grid relative grid-cols-[1fr_1.5fr_1.5fr]">
                   <div className="grid grid-rows-3 row-start-1 items-center justify-center">
                       {event.map((event) => (
                           <button
                               key={event.id}
                               onClick={() => setSelectedEventSpace(event)}
                               className={`cursor-pointer
                                   ${selectedEventSpace.id === event.id
                                       ? 'bg-[#fff] text-[#d48f3f]'
                                       : 'text-[#000521]'
                                   }`}
                           >
                               <h1 className="text-3xl font-medium">{event.name}</h1>
                           </button>
                       ))}
                   </div>
       
                   <div className="h-100">
                        <img src={`storage/${selectedEventSpace.image_path}`} className="h-full w-full aspect-square md:aspect-auto object-cover rounded-lg brightness-65 " />
                    
                   </div>
       
                    <div className="flex flex-col space-y-4 px-10">
                         <p className="text-sm tracking-wide">{selectedEventSpace.description}</p>
                          <Link href={`/event/${selectedEventSpace.id}/${selectedEventSpace.name}`}>
                             <button className="border border-gray-500 mt-5 p-3 hover:bg-[#000521] hover:text-white hover:pointer transition duration:150 ease-in-out delay:70"
                             onClick={()=>handleEventDetails(selectedEventSpace.id, selectedEventSpace.name)}      
                            
                            >BOOK NOW</button>
                          </Link>
                       </div>
               </div>
    )

}