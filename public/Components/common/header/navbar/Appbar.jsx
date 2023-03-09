import * as React from 'react';
import {AppBar , Box , Toolbar , IconButton ,Avatar , InputBase , Badge , MenuItem , Menu , alpha , styled} from '@mui/material';
import {  MoreVert } from "@mui/icons-material"
import {BiLogIn ,BiSearchAlt} from "react-icons/bi"
import DrawerActionButton from './drawerActionButton';
import {ButtonCustomised} from "../../utils/ButtonCustomized"
import css from  "./style.module.css"
import {FaFacebookF , FaInstagram , FaLinkedinIn , FaWhatsapp , FaTwitter} from "react-icons/fa"
import flag from "../../../../assests/image/En.png"
import { Searchs , Searchs2 , SearchIconWrapper , StyledInputBase} from "../../utils/CustomizedSearch"


export default function PrimarySearchAppBar() {
  const [anchorEl, setAnchorEl] = React.useState(null);
  const [mobileMoreAnchorEl, setMobileMoreAnchorEl] = React.useState(null);

  const isMenuOpen = Boolean(anchorEl);
  const isMobileMenuOpen = Boolean(mobileMoreAnchorEl);

  const handleProfileMenuOpen = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleMobileMenuClose = () => {
    setMobileMoreAnchorEl(null);
  };

  const handleMenuClose = () => {
    setAnchorEl(null);
    handleMobileMenuClose();
  };

  const handleMobileMenuOpen = (event) => {
    setMobileMoreAnchorEl(event.currentTarget);
  };

  

  return (
    <Box >
      <AppBar position="static" sx={{background:"none",boxShadow:"none" , p:0,m:0}}>
        <Toolbar sx={{width:"100vw" ,m:0}}>
          <Box sx={{display:"flex",width:"100%" , alignItems:"center",justifyContent:"space-between" ,pr:6 , pl:2}}>
          <IconButton
            size="small"
            edge="start"
            color="inherit"
            aria-label="open drawer"
            sx={{  display:{
                    xs:"inline-block",
                    sm:"inline-block",
                    md:"none",
                    lg:"none",
                    xl:"none"
                  }}}
                  >
            <DrawerActionButton />
            </IconButton>
            <Box sx={{display:{
              xs:"none",
              sm:"none",
              md:"flex",
              lg:"flex",
              xl:"flex"
            } , alignItems:"center" , justifyContent:"space-between" , width:"100%"}}>
            <Box>
              <ButtonCustomised sx={{background:"#02979D",fontFamily:"Gilroy-Bold" , color:"white" , width:"132px" , height:"40px" , mx:2}}>Login</ButtonCustomised>
              <ButtonCustomised sx={{background:"#02979D",fontFamily:"Gilroy-Bold" , color:"white" , width:"132px" , height:"40px"}}>Cart</ButtonCustomised>
              
            </Box>
            <select name="cars" id="cars" className={css.select}>
              <option className={css.option} value="volvo"><img src={require("../../../../assests/image/En.png")}/> EN</option>
              <option className={css.option} value="saab"><Avatar src={flag} sx={{width:"15px",height:"15px"}}/> EN</option>
              <option className={css.option} value="opel"><Avatar src={flag} sx={{width:"15px",height:"15px"}}/> EN</option>
              <option className={css.option} value="audi"><Avatar src={flag} sx={{width:"15px",height:"15px"}}/> EN</option>
            </select>
            <Searchs>
              <SearchIconWrapper>
                <BiSearchAlt /> 
              </SearchIconWrapper>
              <StyledInputBase
                placeholder="Search..."
                inputProps={{ 'aria-label': 'search' }}
              />
            </Searchs>
                      <ul className={css.ul}>
                            <li className={css.li}><FaWhatsapp /></li>
                            <li className={css.li}><FaLinkedinIn /></li>
                            <li className={css.li}><FaInstagram /></li>
                            <li className={css.li}><FaFacebookF /></li>
                            <li className={css.li}><FaTwitter /></li>
                        </ul>
            </Box>
          
          
 
        
          
          </Box>
        </Toolbar>
      </AppBar>
     
    </Box>
  );
}
