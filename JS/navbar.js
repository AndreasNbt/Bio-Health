 function UpdateDropdown(state) {

        var signed_out_list = document.getElementsByClassName("signedout");
        var signed_in_list = document.getElementsByClassName("signedin");

        switch (state) {
            case "0":
                for (i=0;i<signed_out_list.length;i++) {
                    signed_out_list.item(i).classList.remove("hide")
                }
                for (i=0;i<signed_in_list.length;i++) {
                    signed_in_list.item(i).classList.add("hide");
                }
                break;
            
            case "1":
                for (i=0;i<signed_out_list.length;i++) {
                    signed_out_list.item(i).classList.add("hide")
                }
                for (i=0;i<signed_in_list.length;i++) {
                    signed_in_list.item(i).classList.remove("hide");
                }
                break;
        }
    }

