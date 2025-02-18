package main

import (
	"encoding/json" 
	"html/template" 
	"log" 
	"net/http" 
)

// definimos estructura de un cantante
type Cantante struct {
	Nombre       string `json:"nombre"`
	Genero       string `json:"genero"`
	Nacionalidad string `json:"nacionalidad"`
}

// Lista de cantantes clasificados por género
var cantantes = []Cantante{
	// Artistas de Reggaetón
	{Nombre: "Bad Bunny", Genero: "Reggaetón", Nacionalidad: "Puerto Rico"},
	{Nombre: "J Balvin", Genero: "Reggaetón", Nacionalidad: "Colombia"},
	{Nombre: "Daddy Yankee", Genero: "Reggaetón", Nacionalidad: "Puerto Rico"},
	{Nombre: "Ozuna", Genero: "Reggaetón", Nacionalidad: "Puerto Rico"},
	{Nombre: "Maluma", Genero: "Reggaetón", Nacionalidad: "Colombia"},
	// Artistas de Trap
	{Nombre: "Anuel AA", Genero: "Trap", Nacionalidad: "Puerto Rico"},
	{Nombre: "Eladio Carrión", Genero: "Trap", Nacionalidad: "Puerto Rico"},
	{Nombre: "Bryant Myers", Genero: "Trap", Nacionalidad: "Puerto Rico"},
	{Nombre: "Myke Towers", Genero: "Trap", Nacionalidad: "Puerto Rico"},
	{Nombre: "Khea", Genero: "Trap", Nacionalidad: "Argentina"},
	// Artistas de Pop
	{Nombre: "Taylor Swift", Genero: "Pop", Nacionalidad: "Estados Unidos"},
	{Nombre: "Dua Lipa", Genero: "Pop", Nacionalidad: "Reino Unido"},
	{Nombre: "Ariana Grande", Genero: "Pop", Nacionalidad: "Estados Unidos"},
	{Nombre: "Shakira", Genero: "Pop", Nacionalidad: "Colombia"},
	{Nombre: "Ed Sheeran", Genero: "Pop", Nacionalidad: "Reino Unido"},
}


// filtrar cantantes según el género
func filtrarCantantesPorGenero(genero string) []Cantante {
	var filtrados []Cantante
	for _, cantante := range cantantes {
		if cantante.Genero == genero {
			filtrados = append(filtrados, cantante)
		}
	}
	return filtrados
}

// Cargar la plantilla html
var tmpl = template.Must(template.ParseFiles("index.html"))

// Manejador de la ruta principal que usa la plantilla HTML
func handler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "text/html")
	err := tmpl.Execute(w, nil)
	if err != nil {
		http.Error(w, "Error al cargar la página", http.StatusInternalServerError)
	}
}
// Manejadores específicos para cada género
func reggaetonHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	cantantes, err := json.MarshalIndent(filtrarCantantesPorGenero("Reggaetón"), "", "    ")
	if err != nil {
		http.Error(w, "Error al generar JSON", http.StatusInternalServerError)
		return
	}
	w.Write(cantantes)
}

func trapHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	cantantes, err := json.MarshalIndent(filtrarCantantesPorGenero("Trap"), "", "    ")
	if err != nil {
		http.Error(w, "Error al generar JSON", http.StatusInternalServerError)
		return
	}
	w.Write(cantantes)
}

func popHandler(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	cantantes, err := json.MarshalIndent(filtrarCantantesPorGenero("Pop"), "", "    ")
	if err != nil {
		http.Error(w, "Error al generar JSON", http.StatusInternalServerError)
		return
	}
	w.Write(cantantes)
}


// Función principal que inicia el servidor y define las rutas de la API
// Función principal para iniciar el servidor
func main() {
	http.HandleFunc("/", handler) // Ruta principal con la plantilla
	http.HandleFunc("/reggaeton", reggaetonHandler)
	http.HandleFunc("/trap", trapHandler)
	http.HandleFunc("/pop", popHandler)

	log.Println("Servidor iniciado en http://localhost:8080")
	log.Fatal(http.ListenAndServe(":8080", nil))
}