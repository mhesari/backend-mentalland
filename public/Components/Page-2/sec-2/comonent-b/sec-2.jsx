import Box from "@mui/material/Box"
import SelectBox from "../select component/select"
import Button from "@mui/material/Button"
import Grid from "@mui/material/Unstable_Grid2/Grid2";
const Sec2= () => {
  return (
    
      <Box sx={{position:"relative" , bottom:"0px",left:"0px",right:"0px",width:"100%",height:"0.05px" }} >
          <Box sx={{width:"100%",position:"absolute",left:"50%",top:"50%",transform:"translate(-50%,-50%)",background:"white",boxShadow:" rgba(2, 151, 157, 0.2) 0px 18px 50px -10px",zIndex:"999" ,margin:"0px auto",height:"auto",display:"flex",alignItems:"center",justifyContent:"space-around" , border:"1px solid #02979D",width:{lg:"80%",xs:"95%",sm:"90%",md:"85%",xl:"80%"},maxWidth:"1800px",borderRadius:"20px" ,p:"45px 40px"}}>
            <Grid container sx={{display:{xs:"block" , lg:"flex"},alignItems:"center",justifyContent:"space-around"}}>
               <Grid xs={12} lg={4}><SelectBox /></Grid>
               <Grid xs={12} lg={4}><SelectBox /></Grid>
                <Grid xs={12} lg={4} sx={{paddingX:2,textAlign:'center'}}>
                   <Button sx={{padding:{md:"14px 40px",xs:"10px 20px"},"&.MuiButtonBase-root:active":{border:"none",outline:"none"},borderRadius:"16px",outline:"none","&:hover":{color:"#02979D"},"&:focus":{border:"none",outline:"none"}, background:"#02979D",color:"white",fontFamily:"Gilroy-Bold",fontSize:{lg:"17px",xs:"12px"}}}>Request Appointment</Button>  
                </Grid>            
            </Grid>    
          </Box>
       </Box>

  );
};

export default Sec2;
