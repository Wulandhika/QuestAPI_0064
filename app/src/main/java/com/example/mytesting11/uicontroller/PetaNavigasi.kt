package com.example.mytesting11.uicontroller

import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.navigation.NavHostController
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.example.mytesting11.uicontroller.route.DestinasiHome
import com.example.mytesting11.uicontroller.route.DestinasiEntry
import com.example.mytesting11.view.HomeScreen
import com.example.mytesting11.view.EntrySiswaScreen

@Composable
fun DataSiswaApp(
    navController: NavHostController = rememberNavController(),
    modifier: Modifier = Modifier
) {
    HostNavigasi(
        navController = navController,
        modifier = modifier
    )
}

@Composable
fun HostNavigasi(
    navController: NavHostController,
    modifier: Modifier = Modifier
) {
    NavHost(
        navController = navController,
        startDestination = DestinasiHome.route,
        modifier = modifier
    ) {

        composable(DestinasiHome.route) {
            HomeScreen(
                navigateToItemEntry = {
                    navController.navigate(
                        DestinasiEntry.route
                    )
                }
            )
        }

        composable(DestinasiEntry.route) {
            EntrySiswaScreen(
                navigateBack = {
                    navController.navigate(
                        DestinasiHome.route
                    )
                }
            )
        }
    }
}