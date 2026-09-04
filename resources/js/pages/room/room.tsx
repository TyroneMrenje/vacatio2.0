import React from "react";
import { Head } from "@inertiajs/react";
import { Roomy} from "@/types/room";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";
import RoomSelector from "@/components/room-selector";

interface Props{
    roomies:Roomy[],
}

export default function Room({roomies}:Props){

    return(
        <div className="box-border overflow-hidden scroll-smooth">
        <Head title="National treasures"/>
        <Navbar/>
        <div className="flex relative h-screen w-full items-center justify-center">
            <div >
                <img src={`/storage/hotel/hotelroombg-overview.png`} className="aspect-square md:aspect-auto object-cover -z-10 brightness-65"/>
            </div>
            <div className="flex flex-col absolute items-center gap-2">
                <h1 className="text-leading md:text-6xl text-4xl font-bold z-10 text-white">You found our rooms. Congratulations</h1>      
            </div>          
         </div>
         <div className=" flex relative items-center justify-center h-50 text-pretty p-5 mt-30">
            <div className="w-[80%] text-pretty">
                 <p className="font-medium text-md">Experience exceptional hospitality with Vacatio, where every stay is designed to inspire comfort, relaxation, and unforgettable memories. From elegant accommodations and curated experiences to world-class amenities and event spaces, discover destinations that make every journey truly special.Placeholder for the rooms page</p>
            </div>
         </div>
         <RoomSelector roomies={roomies}/>
         <Footer/>
        </div>
    )

}