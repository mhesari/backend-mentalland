import Img1 from "../../../assests/image/Business Adult/Group 951.png";
import Img2 from "../../../assests/image/Business Adult/Rectangle 145.png";
import Stack from "@mui/material/Stack";
import ZPattern from "../../z-pattren/z-pattern.component";
import Button from "../../buttons/button.component";
import Box from "@mui/material/Box"
import css from "./style.module.css"
import CardCom from "../card-pattern.jsx/cardCom";
import Grid from "@mui/material/Unstable_Grid2/Grid2";
import { MainTitle } from "../buttons-form/ButtonsF";
import { Typography } from "@mui/material";
const Sec4 = () => {
  return (
    
      <Box sx={{position:"relative",width:"90%",margin:"0px auto"}} >
        <Box sx={{textAlign:"center",mb:6,mt:36}}>
            <MainTitle>THE LATEST JOB OPPORTUNITIES</MainTitle>
        </Box>
        <Grid container>
          <CardCom />
          <CardCom />
          <CardCom />
          <CardCom />
          <CardCom />
          <CardCom />
        </Grid>
        <Button style={{margin:"20px auto 0px"}}><Typography sx={{fontFamily:"Gilroy-Bold" , fontSize:"16px"}}>See all</Typography></Button>
      </Box>

  );
};

export default Sec4;
