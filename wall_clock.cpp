#include <iostream>
#include <cmath>
#include <GL/glut.h>

// Function to initialize OpenGL
void initOpenGL() {
    glClearColor(0.0, 0.0, 0.0, 1.0); // Set background color to black and opaque
    glMatrixMode(GL_PROJECTION);
    gluOrtho2D(-100, 100, -100, 100); // Define the coordinate system
}

// Function to display the clock
void display() {
    glClear(GL_COLOR_BUFFER_BIT); // Clear the color buffer

    // Draw clock face
    glColor3f(1.0, 1.0, 1.0); // White color
    glBegin(GL_LINE_LOOP);
    for(int i = 0; i < 360; i++) {
        float degInRad = i*DEG2RAD;
        glVertex2f(cos(degInRad)*90, sin(degInRad)*90);
    }
    glEnd();

    // TODO: Add clock hands

    glFlush(); // Render now
}

int main(int argc, char** argv) {
    glutInit(&argc, argv);
    glutCreateWindow("OpenGL Setup Test");
    glutInitWindowSize(320, 320);
    glutInitWindowPosition(50, 50);
    glutDisplayFunc(display);
    initOpenGL();
    glutMainLoop();
    return 0;
}
