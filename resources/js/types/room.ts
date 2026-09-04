export type Roomy = {
    id:string,
    name:string,
    description:string,
    bed_size:number,
    area_size:number,
    image_url:string,
    location:string,
};

export type RoomDetails = {
    id: string;
    name: string;
    description: string;
    amenities: string[];
    view: string;
    max_occupancy: number;
    bed_size: string;
    area_size: number;
    living_room_image: string;
    living_room_location: string;
    bathroom_image: string;
    bathroom_location: string;
    view_image: string;
    view_location: string;
}
