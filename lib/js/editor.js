 $(function() {
            //$("textarea").htmlarea(); // Initialize all TextArea's as jHtmlArea's with default values

           
            $(".text").htmlarea({                
                toolbar: [
                        ["html"], ["bold", "italic", "underline", "strikethrough", "|", "subscript", "superscript"],
						["increasefontsize", "decreasefontsize"],
					
						["indent", "outdent"],
						["justifyleft", "justifycenter", "justifyright"],
					
						["p", "h1", "h2", "h3", "h4", "h5", "h6"]
					
								   
                ]

                
               

             
            });
        });
