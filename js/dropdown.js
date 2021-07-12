function random_function()
{
    var province=document.getElementById("country").value;
    if(province==="Province 1")
    {
        var district=["Select District","Bhojpur","Dhankuta", "Ilam", "Jhapa", "Khotang", "Morang", "Okhaldhunga", "Panchthar", "Sakhuwasabha", "Solukhumbu", "Sunsari", "Taplejung", "Tehrathum", "Udayapur"];
    }
    else if(province==="Province 2")
    {
        var district=["Select District","Parsa","Bara", "Rautahat", "Sarlahi", "Dhanusa", "Siraha", "Mahottari", "Saptari"];
    }

    else if(province==="Bagmati Province")
    {
        var district=["Select District","Sindhuli","Ramechhap", "Dolakha", "Bhaktapur", "Dhading", "Kathmandu", "Kavrepalanchowk", "Lalitpur", "Nuwakot", "Rasuwa", "Sindhupalchok", "Chitwan", "Makwanpur"];
    }

    else if(province==="Gandaki Province")
    {
        var district=["Select District","Baglung","Gorkha", "Kaski", "Lamjung", "Manang", "Mustang", "Myagdi", "Nawalpur", "Parbat", "Syangja", "Tanahun"];
    }

    else if(province==="Lumbini Province")
    {
        var district=["Select District","Kapilvastu","Parasi", "Arghakhanchi", "Gulmi", "Palpa", "Dang Deukhuri", "Pyuthan", "Rolpa", "Eastern Rukum", "Banke", "Bardiya"];
    }

    else if(province==="Karnali Province")
    {
        var district=["Select District","Western Rukum", "Salyan", "Dolpa", "Humla", "Jumla", "Kalikot", "Mugu", "Surkhet", "Dailekh", "Jajarkot"];
    }

    else if(province==="Sudurpashchim Province")
    {
        var district=["Select District","Kailali","Achham", "Doti", "Bajhang", "Bajura", "Kanchanpur", "Dadeldhura", "Baitadi", "Darchula"];
    }
 
    var string="";
 
    for(i=0;i<district.length;i++)
    {
        string=string+"<option value="+district[i]+">"+district[i]+"</option>";
    }
    string = "<select>"+string+"</select>";
    document.getElementById("output").innerHTML=string;
}

function random_function2()
{
    var district=document.getElementById("output").value;

    console.log(district);

    if (district == "Bhojpur"){
        var ward = ["Select Ward", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30"];
    }
    else if (district == "Dhankuta"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Ilam"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Jhapa"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Khotang"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Morang"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Okhaldhunga"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Panchthar"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Sakhuwasabha"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Solukhumbu"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Sunsari"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Taplejung"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Tehrathum"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    else if (district == "Udayapur"){
        var ward = ["Select Ward", "1", "2", "3"];
    }
    

    var string2="";

    for (j=0; j<ward.length; j++){
        console.log("ktm");
        string2 = string2+"<option value="+ward[j]+">"+ward[j]+"</option>";
    }
    string2 = "<select>"+string2+"</select>";
    document.getElementById("warddisplay").innerHTML=string2;

    console.log(string2);
}