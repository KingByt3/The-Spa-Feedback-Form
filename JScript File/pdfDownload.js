$(document).ready(function() {
  $("#download-btn").shieldExportButton({
      dataSource: function() {
          var data = [];
          $("#data-table tr").each(function(index, row) {
              if (index !== 0) {
                  var cells = $(row).find("td");
                  data.push({
                      "Guest Name": cells.eq(0).text(),
                      "Gender": cells.eq(1).text(),
                      "Ambience of the Spa": cells.eq(2).text(),
                      "Applied pressure": cells.eq(3).text(),
                      "Pace of your massage": cells.eq(4).text(),
                      "Massage Therapist": cells.eq(5).text(),
                      "Name of the Therapist": cells.eq(6).text(),
                      "overall Satisfaction experience at the spa": cells.eq(7).text(),
                      "Comments/suggestions of the Guest": cells.eq(8).text(),
                      "Room Number": cells.eq(9).text(),
                      "Answered At": cells.eq(10).text(),
                  });
              }
          });
          return data;
      },
      fileName: "Feedback_Data.pdf",
      exportOptions: {
          type: "pdf",
          jspdf: {
              format: "a4",
              orientation: "portrait",
              margins: {
                  left: 10,
                  right: 10,
                  top: 20,
                  bottom: 20
              }
          },
          jsPDFDocumentOptions: {
              unit: "mm",
              format: "a4",
              orientation: "portrait"
          },
          tableOptions: {
              columnStyles: {
                  0: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  1: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  2: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  3: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  4: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  5: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  6: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  7: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  8: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  9: {
                      columnWidth: "auto",
                      halign: "left"
                  },
                  10: {
                      columnWidth: "auto",
                      halign: "left"
                  }
              }
          }
      }
  });
});