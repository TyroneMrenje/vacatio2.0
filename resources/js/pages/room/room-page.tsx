import React from "react";
import { useState } from "react";
import {Head,Link} from "@inertiajs/react";
import { RoomDetails } from "@/types/room";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";

interface Props{

    roomDetails:RoomDetails
}

export default function RoomPage({ roomDetails }: Props){
    return(
        <div className="box-border overflow-hidden scroll-smooth">
            <Head title="Yebba"/>
            <Navbar/>
            <div className="flex relative h-screen w-full items-center justify-center">
                <div className="h-full w-full">
                     <img src={`/storage/${roomDetails.living_room_image}`} className="h-screen w-full aspect-square md:aspect-auto object-cover object-center -z-10 brightness-65"/>        
                </div>            
            <div className="flex flex-col absolute items-center w-full">
             <div className="flex m-7">
                <p className="text-white text-5xl font-thin">{roomDetails.name} Room</p>
            </div>
             <div className="flex flex-row justify-between w-full px-10 text-white">
                 <p>{roomDetails.bed_size}</p>
                 <p>{roomDetails.area_size} &#13217;</p>
                 <p>{roomDetails.view}</p>
                 <p>Upto {roomDetails.max_occupancy} guests</p>
             </div>
            </div>    
           </div>
            <div className="flex relative m-20">
                <p>{roomDetails.description}</p>
            </div>
            <div className="flex flex-row relative w-full justify-center">
                <div className="md:w-1/2 mr-10">
                    <img src={`/storage/${roomDetails.bathroom_image}`} className="h-[70vh] md:h-[80vh] lg:h-[86vh] rounded-lg aspect-square md:aspect-auto object-cover object-center"/>
                </div>
                <div className="flex flex-col space-y-4">   
                     <h3 className="font-thin text-5xl text-[#000521]">Amenities</h3>                 
                 <ul className="space-y-4">
                     {roomDetails.amenities?.map((amenity, index) => (
                        <li key={index} className="text-sm">
                            {amenity}
                        </li>
                    ))}
                </ul>
                </div>
            </div>  
            <div className="grid grid-cols-3 m-10 p-5">
                <img src={`/storage/${roomDetails.living_room_image}`}/>
                <img src={`/storage/${roomDetails.bathroom_image}`}/>
                <img src={`/storage/${roomDetails.view_image}`}/>
            </div> 
            <Footer/>
        </div>
    )
}