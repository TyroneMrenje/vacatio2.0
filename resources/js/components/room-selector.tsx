import { useState,useEffect } from "react";
import { Roomy,  RoomDetails } from "@/types/room";
import { Link } from "@inertiajs/react";
import axios from "axios";


interface Props {
    roomies: Roomy[];

}

export default function RoomSelector({ roomies }: Props) {

    const[loading, setLoading]=useState(false);
    const [selectedRoom, setSelectedRoom] = useState<Roomy>(roomies[0]);

    async function fetchRoomDetails(id:string,room:string){

        if(!id)return
        setLoading(true);

        try{
            const { data } = await axios.get(`/rooms/${id}/${room}`,{
                headers:{
                    "Content-Type":"application/json"
                },
                params:{
                    id,
                    room
                }
            });

        }finally{
            setLoading(false)
        }
     }


      function handleRoomDetails(id: string, room: string) {
          fetchRoomDetails(id, room) 
      }

   

    return (
        <div className="grid relative grid-cols-[1fr_1.5fr_1.5fr] h-100">
            <div className="grid grid-rows-3 row-start-1 items-center justify-center">
                {roomies.map((room) => (
                    <button
                        key={room.id}
                        onClick={() => setSelectedRoom(room)}
                        className={`cursor-pointer
                            ${selectedRoom.id === room.id
                                ? 'bg-[#fff] text-[#d48f3f]'
                                : 'text-[#000521]'
                            }`}
                    >
                        <h1 className="text-3xl font-medium">{room.name} Room</h1>
                    </button>
                ))}
            </div>

            <div className="h-full ">
                 <img src={`storage/${selectedRoom.image_url}`} className=" h-full aspect-square md:aspect-auto object-cover rounded-lg brightness-65 " />
             
            </div>

             <div className="flex flex-col space-y-4 px-10">
                    <div className="flex flex-row  divide-x space-x-4 gap-2">
                        <p className="p-2">{selectedRoom.area_size} &#13217;</p>
                        <p className="p-2">{selectedRoom.bed_size}</p>                 
                    </div>
                     <p className="text-sm tracking-wider">{selectedRoom.description}</p>
                   <Link href={`/rooms/${selectedRoom.id}/${selectedRoom.name}`}>
                      <button className="border border-gray-500 mt-5 p-3"
                      onClick={()=>handleRoomDetails(selectedRoom.id, selectedRoom.name)}

                       >See More</button>
                   </Link>
                </div>
        </div>
    );
}