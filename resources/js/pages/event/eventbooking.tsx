import React from "react";
import { Head, Form } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";
import { Event } from "@/types/event";

interface Props{
    eventDetails:Event

}

export default function EventSpaceBooking({eventDetails}: Props){

    return(
        <div className="box-border overflow-hidden scroll-smooth">
        <Head title="Doomsday"/>
        <Navbar/>
        <div className="flex relative h-screen w-full items-center justify-center">
            <div className="h-full w-full">
                <img src={`/storage/${eventDetails.image_path}`} className="h-screen w-full aspect-square md:aspect-auto object-cover -z-10 brightness-65"/>
            </div>
            <div className="flex flex-col absolute items-center gap-2">
                <h1 className="text-leading md:text-6xl text-4xl font-bold z-10 text-white">Events & Meetings</h1>      
            </div>          
         </div>
         <div className=" flex relative items-center justify-center text-pretty p-10">
            <div className="w-[80%] text-pretty">
                 <p className="font-medium text-md">{eventDetails.description}</p>
            </div>
         </div>
         <div className="flex flex-row gap-5 w-full justify-center">
            <div className="flex flex-col space-y-4 mx-10">
                <div className="flex items-center flex-row gap-2">
                  <img className="h-5 w-6 bg-none brightness-180 rounded-full" src="/vacatiologo.png"/>
                  <h1>Vacatio</h1>
                </div>
                <p>{eventDetails.contact_email}</p>
                 <p>Diani, Kenya</p>
                <p className="text-sm">Terms may be victim to change</p>
                <p>We try our best</p>

            </div>
            <Form
              action='/eventspace/booking'
              method="POST"
              disableWhileProcessing
              className="flex flex-col gap-6 border rounded-lg border-gray-900 p-5"
            >
              <div className="flex w-full items-center justify-center">
                <h1 className="text-4xl">Vacatio {eventDetails.name}</h1>
              </div>
              <div className="flex flex-row gap-4">
                <div className="flex flex-row space-x-2">
                    <label htmlFor="date">Date:</label>
                    <input id="date" type="date" className="border border-gray-900 text-gray-900 "/>
                </div>
                <div className="flex flex-row space-x-2">
                    <label htmlFor="number">Number of guests:</label>
                    <input name="number" type="number" className="border border-gray-900"/>          
                </div>
              </div>
            </Form>
         </div>
         <Footer/>
        </div>
    )
}