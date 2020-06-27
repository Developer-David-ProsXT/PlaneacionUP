using MySql.Data.MySqlClient;
using OfficeOpenXml;
using System.IO;
using System;

namespace CPlaneacion
{
    class Program
    {
        static MySQLConection myconexion = new MySQLConection();
        static void Main(string[] args)
        {

            switch (args[0])
            {
                case "1":
                    var name_unit = args[1];
                    var date_start = args[2];
                    var date_end = args[3];
                    var topics = args[4];
                    var learning = args[5];
                    var resources = args[6];
                    var references = args[7];
                    var category_materia = args[8];

                    
                    var nuevo_unit_name = Separador(name_unit);
                    var nuevo_topics = Separador(topics);
                    var nuevo_learning = Separador(learning);
                    var nuevo_resources = Separador(resources);
                    var nuevo_references = Separador(references);


                    Ejecutar("call create_unidad('"+ nuevo_unit_name + "', '" + date_start + "', '" + date_end + "', '" + nuevo_topics + "', '" + nuevo_learning + "', '" + nuevo_resources + "', '" + nuevo_references + "', "+ category_materia +");");
                    break;

                case "2":
                    var name_subject = args[1];
                    var category_profe = args[2];
                    var category_periodo = args[3];

                    var nuevo_name_subject = Separador(name_subject);

                    Ejecutar("insert into Materias(nombre, id_profe, id_ciclo) values('" + nuevo_name_subject + "', " + category_profe + ", " + category_periodo + ");");
                    break;

                case "4":

                    ExcelPackage.LicenseContext = LicenseContext.NonCommercial;

                    var ruta_excel = Path.Combine(AppDomain.CurrentDomain.BaseDirectory);
                    string[] files = Directory.GetFiles(ruta_excel, "*.xlsx");
                    var libro_excel = files[0];

                    FileInfo filee = new FileInfo(libro_excel);
                    using (var package = new ExcelPackage(filee))
                    {
                        ExcelWorksheet primera_hoja = package.Workbook.Worksheets[0];
                        var rows = primera_hoja.Dimension.Rows;
                        var columns = primera_hoja.Dimension.Columns;


                    }
                    break;
            }
        }

        public static void Ejecutar(string script)
        {
            MySqlCommand cmd_comando = new MySqlCommand(script, myconexion.AbrirConexion());
            cmd_comando.ExecuteReader();
            myconexion.CerrarConexion();
        }


        public static string Separador(string palabra)
        {
            char delimiter = '_';
            string[] Cadena = palabra.Split(delimiter);

            var nuevapalabra = "";
            for (var i = 0; i < Cadena.Length; i++)
            {
                if (i == 0)
                {
                    nuevapalabra = Cadena[i];
                }
                else 
                {
                    nuevapalabra = nuevapalabra + " " + Cadena[i];
                }
            }
            return nuevapalabra;
        }
    }
}
