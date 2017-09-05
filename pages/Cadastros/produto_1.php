<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de Produtos</h1>
    </div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">

        <link rel="stylesheet" href="../jqwidgets-ver4.5.0/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../../scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxtabs.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var data = new Array();
            var firstNames = ["Nancy", "Andrew", "Janet", "Margaret", "Steven", "Michael", "Robert", "Laura", "Anne"];
            var lastNames = ["Davolio", "Fuller", "Leverling", "Peacock", "Buchanan", "Suyama", "King", "Callahan", "Dodsworth"];
            var titles = ["Sales Representative", "Vice President, Sales", "Sales Representative", "Sales Representative", "Sales Manager", "Sales Representative", "Sales Representative", "Inside Sales Coordinator", "Sales Representative"];
            var titleofcourtesy = ["Ms.", "Dr.", "Ms.", "Mrs.", "Mr.", "Mr.", "Mr.", "Ms.", "Ms."];
            var birthdate = ["08-Dec-48", "19-Feb-52", "30-Aug-63", "19-Sep-37", "04-Mar-55", "02-Jul-63", "29-May-60", "09-Jan-58", "27-Jan-66"];
            var hiredate = ["01-May-92", "14-Aug-92", "01-Apr-92", "03-May-93", "17-Oct-93", "17-Oct-93", "02-Jan-94", "05-Mar-94", "15-Nov-94"];
            var address = ["507 - 20th Ave. E. Apt. 2A", "908 W. Capital Way", "722 Moss Bay Blvd.", "4110 Old Redmond Rd.", "14 Garrett Hill", "Coventry House", "Miner Rd.", "Edgeham Hollow", "Winchester Way", "4726 - 11th Ave. N.E.", "7 Houndstooth Rd."];
            var city = ["Seattle", "Tacoma", "Kirkland", "Redmond", "London", "London", "London", "Seattle", "London"];
            var postalcode = ["98122", "98401", "98033", "98052", "SW1 8JR", "EC2 7JR", "RG1 9SP", "98105", "WG2 7LT"];
            var country = ["USA", "USA", "USA", "USA", "UK", "UK", "UK", "USA", "UK"];
            var homephone = ["(206) 555-9857", "(206) 555-9482", "(206) 555-3412", "(206) 555-8122", "(71) 555-4848", "(71) 555-7773", "(71) 555-5598", "(206) 555-1189", "(71) 555-4444"];
            var notes = ["Education includes a BA in psychology from Colorado State University in 1970.  She also completed 'The Art of the Cold Call.'  Nancy is a member of Toastmasters International.",
                "Andrew received his BTS commercial in 1974 and a Ph.D. in international marketing from the University of Dallas in 1981.  He is fluent in French and Italian and reads German.  He joined the company as a sales representative, was promoted to sales manager in January 1992 and to vice president of sales in March 1993.  Andrew is a member of the Sales Management Roundtable, the Seattle Chamber of Commerce, and the Pacific Rim Importers Association.",
                "Janet has a BS degree in chemistry from Boston College (1984).  She has also completed a certificate program in food retailing management.  Janet was hired as a sales associate in 1991 and promoted to sales representative in February 1992.",
                "Margaret holds a BA in English literature from Concordia College (1958) and an MA from the American Institute of Culinary Arts (1966).  She was assigned to the London office temporarily from July through November 1992.",
                "Steven Buchanan graduated from St. Andrews University, Scotland, with a BSC degree in 1976.  Upon joining the company as a sales representative in 1992, he spent 6 months in an orientation program at the Seattle office and then returned to his permanent post in London.  He was promoted to sales manager in March 1993.  Mr. Buchanan has completed the courses 'Successful Telemarketing' and 'International Sales Management.'  He is fluent in French.",
                "Michael is a graduate of Sussex University (MA, economics, 1983) and the University of California at Los Angeles (MBA, marketing, 1986).  He has also taken the courses 'Multi-Cultural Selling' and 'Time Management for the Sales Professional.'  He is fluent in Japanese and can read and write French, Portuguese, and Spanish.",
                "Robert King served in the Peace Corps and traveled extensively before completing his degree in English at the University of Michigan in 1992, the year he joined the company.  After completing a course entitled 'Selling in Europe,' he was transferred to the London office in March 1993.",
                "Laura received a BA in psychology from the University of Washington.  She has also completed a course in business French.  She reads and writes French.",
                "Anne has a BA degree in English from St. Lawrence College.  She is fluent in French and German."];
            var k = 0;
            for (var i = 0; i < firstNames.length; i++) {
                var row = {};
                row["firstname"] = firstNames[k];
                row["lastname"] = lastNames[k];
                row["title"] = titles[k];
                row["titleofcourtesy"] = titleofcourtesy[k];
                row["birthdate"] = birthdate[k];
                row["hiredate"] = hiredate[k];
                row["address"] = address[k];
                row["city"] = city[k];
                row["postalcode"] = postalcode[k];
                row["country"] = country[k];
                row["homephone"] = homephone[k];
                row["notes"] = notes[k];
                data[i] = row;
                k++;
            }
            var source =
            {
                localData: data,
                dataType: "array"
            };
            // initialize the row details.
            var initRowDetails = function (id, row, element, rowinfo) {
                var tabsdiv = null;
                var information = null;
                var notes = null;
                // update the details height.
                rowinfo.detailsHeight = 200;
                element.append($("<div style='margin: 10px;'><ul style='margin-left: 30px;'><li class='title'>Title</li><li>Notes</li></ul><div class='information'></div><div class='notes'></div></div>"));
                tabsdiv = $(element.children()[0]);
             
                if (tabsdiv != null) {
                    information = tabsdiv.find('.information');
                    notes = tabsdiv.find('.notes');
                    var title = tabsdiv.find('.title');
                    title.text(row.firstname);
                    var container = $('<div style="margin: 5px;"></div>')
                    container.appendTo($(information));
                    var photocolumn = $('<div style="float: left; width: 15%;"></div>');
                    var leftcolumn = $('<div style="float: left; width: 45%;"></div>');
                    var rightcolumn = $('<div style="float: left; width: 40%;"></div>');
                    container.append(photocolumn);
                    container.append(leftcolumn);
                    container.append(rightcolumn);
                    var photo = $("<div class='jqx-rc-all' style='margin: 10px;'><b>Photo:</b></div>");
                    var image = $("<div style='margin-top: 10px;'></div>");
                    var imgurl = '../../images/' + row.firstname.toLowerCase() + '.png';
                    var img = $('<img height="60" src="' + imgurl + '"/>');
                    image.append(img);
                    image.appendTo(photo);
                    photocolumn.append(photo);
                    var firstname = "<div style='margin: 10px;'><b>First Name:</b> " + row.firstname + "</div>";
                    var lastname = "<div style='margin: 10px;'><b>Last Name:</b> " + row.lastname + "</div>";
                    var title = "<div style='margin: 10px;'><b>Title:</b> " + row.title + "</div>";
                    var address = "<div style='margin: 10px;'><b>Address:</b> " + row.address + "</div>";
                    $(leftcolumn).append(firstname);
                    $(leftcolumn).append(lastname);
                    $(leftcolumn).append(title);
                    $(leftcolumn).append(address);
                    var postalcode = "<div style='margin: 10px;'><b>Postal Code:</b> " + row.postalcode + "</div>";
                    var city = "<div style='margin: 10px;'><b>City:</b> " + row.city + "</div>";
                    var phone = "<div style='margin: 10px;'><b>Phone:</b> " + row.homephone + "</div>";
                    var hiredate = "<div style='margin: 10px;'><b>Hire Date:</b> " + row.hiredate + "</div>";
                    $(rightcolumn).append(postalcode);
                    $(rightcolumn).append(city);
                    $(rightcolumn).append(phone);
                    $(rightcolumn).append(hiredate);
                    var notescontainer = $('<div style="white-space: normal; margin: 5px;"><span>' + row.notes + '</span></div>');
                    $(notes).append(notescontainer);
                    $(tabsdiv).jqxTabs({ width: 820, height: 170 });
                }
            }
            var dataAdapter = new $.jqx.dataAdapter(source);
            $("#dataTable").jqxDataTable(
            {
                width: 850,
                source: dataAdapter,
                pageable: true,
                pageSize: 3,
                rowDetails: true,
                sortable: true,
                ready: function () {
                    // expand the first details.
                    $("#dataTable").jqxDataTable('showDetails', 0);
                },
                initRowDetails: initRowDetails,
                columns: [
                      { text: 'First Name', dataField: 'firstname', width: 200 },
                      { text: 'Last Name', dataField: 'lastname', width: 200 },
                      { text: 'Title', dataField: 'title', width: 200 },
                      { text: 'City', dataField: 'city', width: 100 },
                      { text: 'Country', dataField: 'country'}
                ]
            });
        });
    </script>
      <div id="dataTable"></div>
    </div>
</div>      <!-- /.row -->